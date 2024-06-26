<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\WelcomeRequest;
use App\Models\About;
use App\Models\Brand;
use App\Models\MetaTag;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Welcome;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class WebController extends Controller
{
    
    # Home section slides

    public function slides(){
        $slide = Slider::orderBy('id', 'asc')->get();
        return view('admin.slider.index', compact('slide'));
    }

    public function createSlide(){
        return view('admin.slider.create');
    }

    public function SliderStore(Request $request){
        $request->validate([
            'title'=>['nullable', 'string',],
            'description'=>['nullable', 'string',],
            'image'=>['nullable','image', 'mimes:png,jpg,jpeg,gif,png,avif'],
            // 'link'=>['nullable', 'string'],
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename =   time().'.'.$extension;
            $request->image->move(public_path('upload/slider'), $filename);
            // $path = public_path('upload/slider');
            // File::delete($path . $request->image);
        }
        $slide = new Slider;
        $slide->title = $request->title;
        $slide->description = $request->description;
        // $slide->link = $request->link;
        $slide->image = $filename;
        
        if($slide->save()){
            return redirect('admin/slides')->with('success', 'Slide added successfully');
        }else{
            return back()->with('error', 'Oops something went wrong!');
        }


    }

    public function editSlide($id){
        $slide = Slider::find($id);
        if (!$slide) {
            return redirect('admin/slides')->with('error', 'Slide not found');
        }
        return view('admin.slider.edit', compact('slide'));
    }

    public function updateSlide(Request $request, $id)
    {
        $slide = Slider::find($id);
        
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (File::exists(public_path('upload/slider/' . $slide->image))) {
                File::delete(public_path('upload/slider/' . $slide->image));
            }
    
            // Upload new image
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move(public_path('upload/slider'), $filename);
    
            // Update image field in database
            $slide->image = $filename;
        }
    
        // Update other fields
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        $slide->link = $request->input('link');
    
        // Save the changes
        if($slide->save()){
            return redirect('admin/slides')->with('success', 'Slider updated successfully');
        }else{
            return back()->with('error', 'Oops something went wrong!');
        }
    
    }

    public function deleteSlide($id){
        $slide = Slider::find($id);
        if ($slide->delete()) {
            return back()->with('success', 'Slide deleted successfully');
        }else{
            return back()->with('error', 'Oops something went wrong!');
        }
    }


    //About
    public function aboutus()
    {
        $data['title'] = 'About us';
        $data['about'] = About::first();
        return view('admin.about.index', $data);
    }


    public function UpdateAbout(Request $request)
    {

        $request->validate([
            'title' => ['nullable', 'string', 'max:100'],
            'body' => ['nullable', 'string'],
            'mission'=>['nullable', 'string'],
            'vision'=>['nullable', 'string'],
            'choose_us'=>['nullable', 'string'],
            'image'=>['nullable','image', 'mimes:png,jpg,jpeg,gif,png,avif'],
        ]);

        // dd($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move(public_path('upload/About'), $filename);
        }
        
        if(About::count() == 0){
            $data = new About();
            $data->title = $request->title;
            $data->body = $request->body;
            $data->choose_us = $request->choose_us;
            $data->mission = $request->mission;
            $data->vision = $request->vision;
            $data->image = $filename;
            $data->save();
            return back()->with('success', ' Created Successfully!');
        }else{
            $data = About::findOrFail(1);
            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if (File::exists(public_path('upload/About/' . $data->image))) {
                    File::delete(public_path('upload/About/' . $data->image));
                }
                // Upload new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $image->move(public_path('upload/About'), $filename);
                // Update image field in database
                $data->image = $filename;
            }
            $data->update([
                'title' => $request->title,
                'body'=>$request->body,
                'mission'=>$request->mission,
                'vision'=>$request->vision,
                'choose_us'=>$request->choose_us,
            ]);
            return back()->with('success', ' Updated Successfully!');
        }
        
        return back()->with('error', 'Problem With Updating link');
        
    }
    //

    
    
    //Social
    public function sociallinks()
    {
        $data['title'] = 'Social links';
        $data['social'] = Social::first();
        return view('admin.social.index', $data);
    }
    public function UpdateSocial(Request $request)
    {
        $request->validate([
            'facebook'=>['nullable', 'string'],
            'instagram'=>['nullable', 'string'],
            'twitter'=>['nullable', 'string'],
            'linkedin'=>['nullable', 'string'],
            'email'=>['nullable', 'email', 'string'],
            'phone'=>['nullable', 'string'],
            'address'=>['nullable', 'string'],
         ]);

        if(Social::count() > 0){
            $social = Social::find(1);
            $social->facebook = $request->input('facebook');
            $social->instagram = $request->input('instagram');
            $social->twitter = $request->input('twitter');
            $social->linkedin = $request->input('linkedin');
            $social->email = $request->input('email');
            $social->address = $request->input('address');
            $social->address_2 = $request->input('address_2');
            $social->address_3 = $request->input('address_3');
            $social->phone = $request->input('phone');
            $sav = $social->save();
            if ($sav) {
                return back()->with('success', ' Updated Successfully!');
            } else {
                return back()->with('error', 'Problem With Updating link');
            }
        }else{
            $social = new Social();
            $social->facebook = $request->input('facebook');
            $social->instagram = $request->instagram;
            $social->twitter = $request->twitter;
            $social->linkedin = $request->linkedin;
            $social->email = $request->email;
            $social->address = $request->address;
            $social->address_2 = $request->address_2;
            $social->address_3 = $request->address_3;
            $social->phone = $request->phone;
            $sav = $social->save();
            if ($sav) {
                return back()->with('success', ' Created Successfully!');
            }else{
                return back()->with('error', 'Problem With Creating link');
            }
        }
    }
    //

    //Brand
    public function Brand()
    {
        $data['title'] = 'Brands';
        $data['brand'] = Brand::first();
        return view('admin.brand.index', $data);
    }


    public function CreateBrand(Request $request)
    {
        $request->validate([
            'name' => ['nullable', 'string', 'max:100'],
            'image'=>['nullable','image', 'mimes:png,jpg,jpeg,gif,png,avif'],
        ]);

        if($request->hasFile('image')) {
            $image_file = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/brand/'),$image_file);
        }

        if (Brand::count() == 0) {
            $brand = new Brand;
            $brand->name = $request->name;
            $brand->image = $image_file;
            if($brand->save()){
                return back()->with('success', 'Save Successfully');
            }else{
                return back()->with('error', 'Oops something went wrong');
            }
        } else {
            $brand = Brand::find(1);
            $brand->image = $image_file ?? $brand->image;
            $brand->name = $request->input('name');
            if($brand->save()){
                return redirect('admin/brand')->with('success', 'Saved Successfully!');
            }else{
                return back()->with('error', 'Oops something went wrong');
            }
        }
        return back()->with('error', 'Oops something went wrong');
        
    }
    

    public function DestroyBrand($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->delete()) {
            return back()->with('success', 'Brand was Successfully deleted!');
        } else {
            return back()->with('error', 'Problem With Deleting Brand');
        }
    }

    //Review

    public function review()
    {
        $data['title'] = 'Reviews';
        $data['review'] = Review::orderBy('id', 'asc')->get();
        return view('admin.review.index', $data);
    }

    public function CreateReview(){
        $data['title'] = 'Reviews';
        return view('admin.review.create', $data);
    }

    public function EditReview($id)
    {
        $data['title'] = 'Reviews';
        $data['review'] = Review::find($id);
        return view('admin.review.edit', $data);
    }

   
    public function StoreReview(Request $request)
    {
        $review = new Review;
        $review->name = $request->name;
        $review->occupation = $request->occupation;
        $review->review = $request->review;
        $review->status = $request->input('publish') ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->extension();
            $image->move(public_path('upload/review/' . $filename));
            $review->image = $filename;
        }
        if ($review->save()) {
            return redirect('admin/review')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('error', 'Problem With Creating Review');
        }
    }

    public function UpdateReview(Request $request)
    {
        $review = Review::find($request->id);
        
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
        // Delete old image if it exists
        if (File::exists(public_path('upload/review/' . $review->image))) {
                File::delete(public_path('upload/review/' . $review->image));
            }
            // Upload new image
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move(public_path('upload/review'), $filename);
            // Update image field in database
            $review->image = $filename;
        }
        $review->name = $request->input('name');
        $review->occupation = $request->input('occupation');
        $review->review = $request->input('review');
        
        if ($review->save()) {
            return redirect('admin/review')->with('success', 'Updated Successfully!');
        } else {
            return back()->with('error', 'Problem With Creating Review');
        }
    }

    
    public function DestroyReview($id)
    {
        $review = Review::findOrFail($id);
        if ($review->delete()) {
            return back()->with('success', 'Review was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Review');
        }
    }
 

    //

    //Service
    public function services()
    {
        $data['title'] = 'Services';
        $data['service'] = Service::orderBy('id', 'asc')->get();
        return view('admin.service.index', $data);
    }
    public function EditService($id)
    {
        $data['title'] = 'Service';
        $data['service'] = Service::find($id);
        return view('admin.service.edit', $data);
    }

    public function CreateService(){
        $data['title'] = 'Service';
        return view('admin.service.create', $data);
    }

    public function StoreService(Request $request)
    {
        
        $request->validate([ 
            'title'=>['nullable', 'string'],
            'description'=>['nullable', 'string'],
            'image'=>['nullable','image', 'mimes:png,jpg,jpeg,gif,png,avif'],
        ]);

        if($request->hasFile('image')) {
            $image_file = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/service/'),$image_file);
        }
        
        $service = new Service;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->image = $image_file ?? $request->image;
        if ($service->save()) {
            return redirect('admin/service')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('error', 'Problem With Creating New Service');
        }
    }
    public function UpdateService(Request $request, $id)
    {
        $service = Service::find($id);
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (File::exists(public_path('upload/service/' . $service->image))) {
                    File::delete(public_path('upload/service/' . $service->image));
                }
                // Upload new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $image->move(public_path('upload/service'), $filename);
                // Update image field in database
                $service->image = $filename;
            }
        $service->update([ 
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
        ]);
        return redirect('admin/service')->with('success', 'Updated Successfully!');
    }

    public function DestroyService($id)
    {
        $service = Service::findOrFail($id);
        if ($service->delete()) {
            return back()->with('success', 'Service was Successfully deleted!');
        } else {
            return back()->with('error', 'Problem With Deleting Service');
        }
    }


    public function Portfolio(){
        $data['title'] = 'Portfolio';
        $data['portfolio'] = Portfolio::orderBy('id', 'asc')->get();
        return view('admin.portfolio.index', $data);
    }

    public function CreatePortfolio(){
        $data['title'] = 'Portfolio';
        return view('admin.portfolio.create', $data);
    }

    public function StorePortfolio(Request $request){
        $request->validate([
            'title'=>['nullable', 'string'],
            'description'=>['nullable', 'string'],
            'image'=>['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
        ]);
        $portfolio = new Portfolio();
        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (File::exists(public_path('upload/portfolio/' . $portfolio->image))) {
                    File::delete(public_path('upload/portfolio/' . $portfolio->image));
                }
                // Upload new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $image->move(public_path('upload/portfolio'), $filename);
                // Update image field in database
                $portfolio->image = $filename;
            }
       if( $portfolio->save()){
           return redirect('admin/portfolio')->with('success', 'Portfolio Created Successfully!');
       }else{
           return back()->with('error', 'Problem With Creating Portfolio');
       }
        
    }

    public function EditPortfolio($id){
        $data['title'] = 'Portfolio';
        $data['portfolio'] = Portfolio::find($id);
        return view('admin.portfolio.edit', $data);
    }

    public function UpdatePortfolio(Request $request ,$id){
        $request->validate([
            'title'=>['nullable', 'string'],
            'description'=>['nullable', 'string'],
            'image'=>['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
        ]);
        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() .'.' .$image->extension();
            $image->move(public_path('upload/portfolio/' . $filename));
            $portfolio->image = $filename;
        }
        if( $portfolio->save()){
            return redirect('admin/portfolio')->with('success', 'Portfolio Updated Successfully!');
        }else{
            return back()->with('error', 'Problem With Updating Portfolio');
        }

    }

    public function DeletePortfolio($id){
        $portfolio = Portfolio::find($id);
        if($portfolio->delete()){
            return redirect('admin/portfolio')->with('success', 'Portfolio Deleted Successfully!');
        }else{
            return back()->with('error', 'Problem With Deleting Portfolio');
        }
    }

    public function Setting(){
        $data['title'] = 'Setting';
        $data['setting'] = Setting::first();
        return view('admin.setting.index', $data);
    }



    public function StoreSetting(SettingRequest $request){
        if(Setting::count()){
           Setting::first()->update($request->validated());
        }else{
            Setting::create($request->validated());
        }
        return redirect('admin/setting')->with('success', 'Setting Updated Successfully!');
    }


    // sector
    public function Sector(){
        $data['title'] = 'Sector';
        $data['sector'] = Sector::orderBy('id', 'asc')->get();
        return view('admin.sector.index', $data);
    }


    public function CreateSector(){
        $data['title'] = 'Sector';
        return view('admin.sector.create', $data);
    }

    public function StoreSector(Request $request){
        $request->validate([ 
            'title'=>['nullable', 'string'],
            'description'=>['nullable', 'string'],
            'image'=>['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
        ]);

        $sector_image = null;
        if($request->hasFile('image')) {
            $sector_file = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/sector/'),$sector_file);
            $sector_image = $sector_file;
        }

        $sector = new Sector();
        $sector->title = $request->title;
        $sector->description = $request->description;
        $sector->image = $sector_image;
        if( $sector->save()){
            return redirect('admin/sector')->with('success', 'Sector Created Successfully!');
        }else{
            return back()->with('error', 'Problem With Creating Sector');
        }
    }

    public function EditSector($id){
        $data['title'] = 'Sector';
        $data['sector'] = Sector::find($id);
        return view('admin.sector.edit', $data);
    }

    public function UpdateSector(Request $request, $id){
        $sector = Sector::find($id);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (File::exists(public_path('upload/sector/' . $sector->image))) {
                    File::delete(public_path('upload/sector/' . $sector->image));
                }
                // Upload new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $sectorfile = time() . '.' . $extension;
                $image->move(public_path('upload/sector'), $sectorfile);
                $sector->image = $sectorfile;
            }
            $sector->update([ 
                'title' => $request->input('title'),
                'description'=>$request->input('description'),
            ]);

            return redirect('admin/sector')->with('success', 'Sector Updated Successfully!');
    }

    public function DeleteSector($id){
        $sector = Sector::find($id);
        if($sector->delete()){
            return redirect('admin/sector')->with('success', 'Sector Deleted Successfully!');
        }else{
            return back()->with('error', 'Problem With Deleting Sector');
        }
    }


    // welcome
    public function Welcome(){
        $data['title'] = 'Welcome';
        $data['welcome'] = Welcome::first();
        return view('admin.welcome.index', $data);
    }


    public function StoreWelcome(WelcomeRequest $request){
        if(Welcome::count()){
            Welcome::first()->update($request->validated());
        }else{
            Welcome::create($request->validated());
        }
        return redirect('admin/welcome')->with('success', 'Updated Successfully!');
    }


    // blog category

    public function Category(){
        $data['title']  = "Blog Category";
        $data['category'] = Category::orderBy('id', 'asc')->get();
        return view('admin.category.index', $data);
    }

    public function CreateCategory(){
        $data['title']  = "Blog Category";
        return view('admin.category.create', $data);
    }

    public function StoreCategory(Request $request){
        $request->validate([ 
            'title'=>['nullable', 'string'],
        ]);

        Category::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
        ]);
        return redirect('admin/category')->with('success', 'Created Successfully');
    }



    public function EditCategory($id){
        $data['title'] = 'Blog Category';
        $data['category'] = Category::find($id);
        return view('admin.category.edit', $data);
    }

    public function UpdateCategory(Request $request,$id){
        $request->validate([
            'title'=>['nullable', 'string'],
        ]);

        $category = Category::find($id);
        $category->update([ 
            'title'=>$request->input('title'),
            'slug'=>Str::slug($request->title)
        ]);
        return redirect('admin/category')->with('success', 'Updated  Successfully');
    }

    public function DeleteCategory($id){
        $category = Category::find($id);
        if($category->delete()){
            return redirect('admin/category')->with('success', 'Deleted Successfuly');
        }else{
            return back()->with('error', 'Oops something went worry');
        }
    }

    // blog
    public function Blog(){
        $data['title'] = 'Blog ';
        $data['blog'] = Post::orderBy('id', 'asc')->get(); 
        return view('admin.blog.index',$data);
    }

    public function CreateBlog(){
        $data['title'] = 'Blog';
        $data['category'] = Category::orderBy('id', 'asc')->get();
        return view('admin.blog.create', $data);
    }

    public function StoreBlog(Request $request){
        $request->validate([
            'title'=>['nullable', 'string'],
            'content'=>['nullable', 'string'],
            'image'=>['nullable', 'image', 'mimes:png,jpg,jpeg,gif,'], 
        ]);

        $blog_image = null;
        if($request->hasFile('image')) {
            $blog_file = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/blog/'),$blog_file);
            $blog_image = $blog_file;
        }

        $blog = new Post();
        $blog->title = $request->title;
        // $blog->author = $request->author;
        $blog->slug = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->image = $blog_image;
        $blog->status = $request->status;
        $blog->category_id = $request->category_id;
        if( $blog->save()){
            return redirect('admin/blog')->with('success', 'Blog Created Successfully!');
        }else{
            return back()->with('error', 'Problem With Creating Blog');
        }
    }


    public function EditBlog($id){
        $data['title'] = 'Edit Blog';
        $data['blog'] = Post::find($id);
        $data['category'] = Category::orderBy('id', 'asc')->get();
        return view('admin.blog.edit', $data);
    }

    public function UpdateBlog(Request $request, $id){
        $request->validate([
            'title'=>['nullable', 'string'],
            'content'=>['nullable', 'string'],
            'image'=>['nullable', 'image', 'mimes:png,jpg,jpeg,gif,'], 
        ]);

        $blog = Post::find($id);
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (File::exists(public_path('upload/blog/' . $blog->image))) {
                    File::delete(public_path('upload/blog/' . $blog->image));
                }
                // Upload new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $blog_image = time() . '.' . $extension;
                $image->move(public_path('upload/blog'), $blog_image);
                $blog->image = $blog_image;
            }

        
        $blog->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'slug'=>Str::slug($request->title),
            'status'=>$request->input('status') ? 1 : 0,
            'category_id'=>$request->input('category_id'),
        ]);
        return redirect('admin/blog')->with('success', 'Updated Successfuly');
    }

    public function DeleteBlog($id){
        $blog = Post::find($id);
        if($blog->delete()){
            return redirect('admin/blog')->with('success', 'Deleted Successfuly');
        }else{
            return back()->with('error', 'Oops something went worry');
        }
    }

    // meta tag
    public function MetaTag()
    {
        $data['title'] = "Meta Tag";
        $data['metaTag'] = MetaTag::orderBy('id', 'asc')->get();
        return view('admin.metatags.index', $data);
    }

    public function CreateMetaTag()
    {
        $data['title'] = "Meta Tag";
        return view('admin.metatags.create', $data);
    }

    public function StoreMetaTag(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $metatag = new MetaTag;
        $metatag->name = $request->name;
        $metatag->content = $request->content;
        if($metatag->save()){
            return redirect('admin/metaTag')->with('success', 'Meta tag created successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function EditMetaTag($id)
    {
        $data['title'] = "Meta Tag";
        $data['metaTag'] = MetaTag::findOrFail($id);
        return view('admin.metatags.edit', $data);
    }

    public function UpdateMetaTag(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $metaTag = MetaTag::findOrFail($id);
        $metaTag->update($request->all());
        return redirect('admin/metaTag')->with('success', 'Meta tag updated successfully.');
    }

    public function DeleteMetaTag($id)
    {
        $metaTag = MetaTag::findOrFail($id);
        if($metaTag->delete()){
            return redirect('admin/metatag')->with('success', 'Meta tag deleted successfully.');
        }else{
            return back()->with('error', 'Something went wrong.');
        }

    }

    public function inbox(){
        $contact = Contact::paginate(20);
        return view('admin.email-inbox', compact('contact'));
    }

    public function inboxDetails($id){
        $contact = Contact::find($id);
        return view('admin.email-inbox-details', compact('contact'));
    }

    public function inboxDelete($id){
        $contact = Contact::find($id);
        if($contact->save()){
            return back()->with('success', 'Deleted Successful');
        }else{
            return back()->with('error', 'Something went worry');
        }
    }
}





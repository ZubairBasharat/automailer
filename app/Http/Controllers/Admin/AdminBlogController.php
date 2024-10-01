<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBlogsStoreRequest;
use App\Http\Resources\BlogsResource;
use Illuminate\Http\Request;
use App\Models\Admin\SeoBlog;
use App\Library\ImageService;
use App\Http\Requests\AdminBlogsUpdateRequest;

class AdminBlogController extends Controller
{
    public function index() {
        $blogs = BlogsResource::collection(SeoBlog::orderBy('id', 'DESC')->paginate(10));
        return view('admin.blog.blog-list', compact('blogs'));
    }

    public function add(Request $request) {
        $blog = null;
        if($request->query('type') == 'edit' && $request->query('blog')) {
            $blog = SeoBlog::where('id', $request->query('blog'))->first();
            if(!$blog) {
                return redirect()->route('admin.blogs.add')->with('error', 'Blog not found');
            }
        }
        return view('admin.blog.add-blog', compact('blog'));
    }

    public function store(AdminBlogsStoreRequest $request, SeoBlog $blog) {
        $data = $request->toArray();
        if($request->hasFile('archivo')) {
            $filename = ImageService::uploadProfileImage($request->file('archivo'),'blogs');
            $data['archivo'] = $filename;
        }
        $blog->create($data);
        return redirect()->route('admin.blogs')->with('message', 'Blog has been added successfully');
    }

    public function update(AdminBlogsUpdateRequest $request, SeoBlog $blog) {
        $data = $request->all();
        if($request->hasFile('archivo')) {
            $filename = ImageService::uploadProfileImage($request->file('archivo'),'blogs', 'blogs/'.$blog->archivo);
            $data['archivo'] = $filename;
        }
        $blog->update($data);
        return redirect()->route('admin.blogs')->with('message', 'Blog has been updated successfully');
    }
    
    public function destroy(Request $request, SeoBlog $blog) {
        ImageService::oldFileCleanUp('blogs/'.$blog->archivo);
        $blog->delete();
        return redirect()->route('admin.blogs')->with('message', 'Blog has been deleted successfully');
    }
}

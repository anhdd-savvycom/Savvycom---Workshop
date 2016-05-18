<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreBlogRequest;

use Session;

class BlogController extends Controller
{
    public function __construct(\App\Blog $blogs)
    {
        $this->blogs = $blogs;
    }

    public function index()
    {
        $blogs = $this->blogs->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.blogs.index')->with('blogs', $blogs);
    }

    public function add()
    {
        return view('admin.blogs.add');
    }

    public function doAdd(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
            'content' => 'required'
        ]);

        $this->blogs->create($request->only(['title', 'description', 'content']));

        Session::flash('success', 'Blog has been added.');

        return redirect('/admin/blogs');
    }

    public function edit($id)
    {
        $blog = $this->blogs->find($id);

        return view('admin.blogs.edit')->with('blog', $blog);
    }

    public function doEdit(StoreBlogRequest $request)
    {
        $blog = $this->blogs->find($request->input('id'));

        $blog->update($request->only(['title', 'description', 'content']));

        Session::flash('success', 'Blog has been updated.');

        return redirect('/admin/blogs');
    }

    public function delete($id)
    {
        $this->blogs->where('id', $id)->delete();

        Session::flash('success', 'Blog has been deleted.');

        return redirect('/admin/blogs');
    }
}

<?php

namespace IS\Http\Controllers;


use IS\Http\Requests;
use IS\Repositories\CategoryRepository;
use IS\Http\Requests\AdminCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * @var CategoryRepository
     */

    private $repository;

    public function __construct(CategoryRepository $repository)

    {
        $this->repository = $repository;
    }


    public function index()
    {
        $categories= $this->repository->paginate(5);
        $categories->setPath('categories');

          return view('admin/categories/index',compact('categories'));

    }

    public function create()
    {


        return view('admin/categories/create');

    }

    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);

        return view('admin/categories/edit',compact('category'));

    }
    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data,$id);

        return redirect()->route('admin.categories.index');
    }
}

<?php

namespace App\Repositories;

use App\Identity;

class IdentityRepository
{

/*    public function list()
    {
        return request()->user()->projects()->get();
    }*/


    /**
     * 创建身份
     *
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        return $request->user()->hasOneIdentity()->create([
            'real_name' => $request->real_name,
            'mobile'    => $request->mobile,
            'id_card'   => $request->id_card,
        ]);
    }

/*    public function thumb($request)
    {
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->thumbnail;
            $name  = $thumb->hashName();
            $thumb->storeAs('public/thumbs/original', $name);

            $path = storage_path('app/public/thumbs/cropped/' . $name);
            Image::make($thumb)->resize(200, 90)->save($path);

            return $name;
        }
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function todos($project)
    {
        return $project->tasks()->where('completion', 0)->get();
    }

    public function dones($project)
    {
        return $project->tasks()->where('completion', 1)->get();
    }

    public function delete($id)
    {
        $project = $this->find($id);
        return $project->delete();
    }

    public function update($request, $id)
    {
        $project = $this->find($id);

        $project->name = $request->name;
        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $this->thumb($request);
        }

        return $project->save();
    }*/
}
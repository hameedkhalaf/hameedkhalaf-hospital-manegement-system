<?php
namespace App\Interfaces\Sections;


interface SectionRepositoryInterface
{

    // get All Sections
    public function index();

    // store Sections
    public function store($request);

    // Update Sections
    public function update($request);

    // destroy Sections
    public function destroy($request);

    //show all doctors belong to section
    public function show($id);

}
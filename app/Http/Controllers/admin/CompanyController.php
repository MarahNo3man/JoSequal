<?php

namespace App\Http\Controllers\admin;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.company.index', compact('companies'));
    }



    public function create()
    {
        return view('admin.company.create');
    }
    public function store(StoreCompanyRequest $request)
    {
        $logo = null;
        if (isset($request->logo)) {
            $orginal_image = $request->file('logo');
            $upload_location = 'storage/logo/';
            $logo = $this->saveFile($orginal_image, $upload_location);
        }

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logo,
            'website' => $request->website,
        ]);
        return redirect()->route('admin.index-companies')->with('status', 'created by successfully');
    }

    public function show($id)
    {
        $company = Company::find($id);
        if (isset($company)) {
            return view('admin.company.show', compact('company'));
        }
        return redirect()->route('admin.index-companies')->with('status', 'Not Found');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        if (isset($company)) {
            return view('admin.company.edit', compact('company'));
        }
        return redirect()->route('admin.index-companies')->with('status', 'Not Found');
    }

    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        if (isset($company)) {
            $logo = null;
            if (isset($request->logo)) {
                if ($company->getAttributes()['logo'] != null) {
                    $image_path = $company->getAttributes()['logo'];
                    if (isset($company->getAttributes()['logo']) && File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $orginal_image = $request->file('logo');
                $upload_location = 'storage/logo/';
                $logo = $this->saveFile($orginal_image, $upload_location);
            } else {
                $logo = $company->getAttributes()['logo'];
            }

            $company->update([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $logo,
                'website' => $request->website,
            ]);
            return redirect()->route('admin.index-companies')->with('status', 'Updated');
        }
        return redirect()->route('admin.index-companies')->with('status', 'Not Found');
    }
    public function delete($id)
    {
        $company = Company::find($id);
        if (isset($company)) {
            foreach ($company->employees as $employee) {
                $employee->delete();
            }
            $company->delete();
            return redirect()->route('admin.index-companies')->with('status', 'Deleted');
        }
        return redirect()->route('admin.index-companies')->with('status', 'Not Found');
    }
}

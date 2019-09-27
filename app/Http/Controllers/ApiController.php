<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\CreateWorkInformationRequest;
use App\City;
use App\Study_credit;
use App\Document_type;
use App\Customer;
use App\Nomenclature;
use App\Change;
use App\Company;
use App\Activity;
use App\Position;
use App\Work_information;
use App\Work_exp_by_cre_study;
use Auth;
use DB;

class ApiController extends Controller
{
    public function getCities()
    {
        return $city = City::select(DB::raw('CONCAT(cities.city," ( ",departaments.departament," ) ") AS city'),'cities.id','cities.id_departament','departaments.departament')
            ->join('departaments','cities.id_departament','departaments.id')
            ->get();
    }
    public function getStudyCreditsByUser($user)
    {
        return $credits = Study_credit::where('us_cr','=',$user)
            ->get();
    }
    public function getIdTypes()
    {
        return $id_types = Document_type::get();
    }
    public function getNomenclatures() 
    {
        return $nomenclatures = Nomenclature::all();
    }
    public function getCustomers()
    {
        return $customers = Customer::select(DB::raw('CONCAT(IFNULL(customers.name,"")," ",IFNULL(customers.first_last_name,"")," ( ",IFNULL(customers.idn,"")," ) ") AS label'),
        'customers.id', 'customers.document_type_id', 'customers.idn', 'customers.name', 'customers.first_last_name', 'customers.second_last_name', 'customers.birth_date',
        'customers.born_city', 'customers.address', 'customers.address_city', 'customers.neighborhood', 'customers.cellphone', 'customers.phone',
        'customers.mail', 'customers.us_cr', 'cities.city')
            ->join('cities','customers.born_city', 'cities.id')
            ->get();
    }
    public function getCompaniesApi()
    {
        $companies = Company::select(DB::raw('CONCAT(IFNULL(companies.bs_name,"")," ",IFNULL(companies.acronym,"")," ( ",IFNULL(companies.nit,"")," ) ") AS label'),'companies.id AS company_id','companies.bs_name','companies.acronym','companies.nit','companies.verification_digit',
        'companies.web','companies.email','companies.address','companies.logo','companies.phone1',
        'companies.phone2','companies.phone3','companies.city_id')
        ->get();
        return $companies;
    }
    public function customersNew(CreateCustomerRequest $request)
    {
        $customer = Customer::create([
            'document_type_id' => $request['document_type_id'],
            'idn' => $request['idn'],
            'name' => strtoupper($request['name']),
            'first_last_name' => strtoupper($request['first_last_name']),
            'second_last_name' => strtoupper($request['second_last_name']),
            'birth_date' => $request['birth_date'],
            'born_city' => $request['born_city'],
            'address_city' => $request['address_city'],
            'address' => $request['address'],
            'neighborhood' => $request['neighborhood'],
            'mail' => $request['mail'],
            'phone' => $request['phone'],
            'cellphone' => $request['cellphone'],
            'us_cr' => Auth::user()->id,
        ]);
        Change::create([
            'description' => 'Creo el cliente:'.$request['name'].' '.$request['first_last_name'].' correctamente.',
            'id_item' => 10,
            'us_cr' => Auth::user()->id,
        ]);
        return $customer;
    }
    public function companyStore(CreateCompanyRequest $request)
    {
        if($request['logoChanged']){
            $exploded = explode(',', $request->logo);
                    $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0],'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';
            $fileName = str_random().'.'.$extension;
            $path = public_path().'/storage/logos/'.$fileName;
            file_put_contents($path, $decoded);
            $logo = $request->file['logo'];
            $request['logo'] = $fileName;
            }else{
                $request['logo'] = '';
            }
            $request['bs_name'] = strtoupper($request['bs_name']);
            $request['acronym'] = strtoupper($request['acronym']);
            $request['status_id'] = 1;
            $request['us_cr'] = Auth::user()->id;
        $company = Company::create($request->all());
        Change::create([
            'description' => 'Creo la empresa:'.$request['bs_name'].' '.$request['nit'].' correctamente.',
            'id_item' => 10,
            'us_cr' => Auth::user()->id,
        ]);
        return $company;
    }
    public function getCompanyById(Company $company)
    {
        return $company;
    }
    public function getActivities()
    {
        return $activities = Activity::all();
    }
    public function storeNewActivity(Request $request)
    {
        return $activity = Activity::create($request->all());
    }
    public function getPositions()
    {
        return $positions = Position::all();
    }
    public function storeNewPosition(Request $request)
    {
        return $position = Position::create($request->all());
    }
    public function storeNewWorkXp(CreateWorkInformationRequest $request)
    {
        $request['us_cr'] = Auth::user()->id;
        $request['status_id'] = 1;
        return $workXp = Work_information::create($request->all());
    }
    public function getWorkInformationsByCustomer($customer)
    {
        return $work_informations = Work_information::select('work_informations.id', 'work_informations.customer_id', 'work_informations.montly_income', 
            'work_informations.activity_id', 'work_informations.company_id', 'work_informations.position_id', 'work_informations.init_date', 
            'work_informations.obs', 'work_informations.status_id', 'companies.bs_name', 'customers.name', 'customers.first_last_name', 'customers.second_last_name')
            ->where('customer_id','=',$customer)
            ->join('customers','work_informations.customer_id', 'customers.id')
            ->join('companies','work_informations.company_id', 'companies.id')
            ->get();
    }
    public function getWorkInformationById($work_information)
    {
        return $work_information_s = Work_information::select('work_informations.id', 'work_informations.customer_id', 'work_informations.montly_income', 
        'work_informations.activity_id', 'work_informations.company_id', 'work_informations.position_id', 'work_informations.init_date', 
        'work_informations.obs', 'work_informations.status_id', 'companies.bs_name', 'customers.name', 'customers.first_last_name', 'customers.second_last_name')
            ->where('work_informations.id','=',$work_information)
            ->join('customers','work_informations.customer_id', 'customers.id')
            ->join('companies','work_informations.company_id', 'companies.id')
            ->first();
    }
    public function storeCreditStudy(Request $request)
    {
        $request['us_cr'] = Auth::user()->id;
        return $study_credit = Study_credit::create($request->all());
    }
    public function storeWorkExpByCreditStudy(Request $request)
    {
        $request['us_cr'] = Auth::user()->id;
        return $work_exp_by_cre_study = Work_exp_by_cre_study::create($request->all());
    }
}

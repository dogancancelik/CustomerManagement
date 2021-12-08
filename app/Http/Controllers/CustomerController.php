<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(){
        $customers = $this->customerRepository->all();

        return view('list',compact('customers'));
    }

    public function show($customerId){
        $customer = $this->customerRepository->findById($customerId);

        return $customer;
    }

    public function create(){
        $companies = $this->customerRepository->allCompanies();

        return view('add',compact('companies'));
    }

    public function store(Request $request){
        if($this->customerRepository->MernisControl()){
                $this->customerRepository->store();
        }else{
            return redirect()->back()->withInput($request->input())->with('error','Your identity information is incorrect!');
        }

        return redirect('/customers');
    }

    public function edit($customerId){
        $customer = $this->customerRepository->findById($customerId);
        $companies = $this->customerRepository->allCompanies();

        return view('edit',compact('customer','companies'));
    }

    public function update($customerId,Request $request){
        if($this->customerRepository->MernisControl()){
            $this->customerRepository->update($customerId);
        }else{
            return redirect('/customer/'.$customerId.'/edit')->with('error','Your identity information is incorrect!');
        }

        return redirect('/customers');
    }

    public function destroy($customerId){
        $customer = $this->customerRepository->delete($customerId);

        return redirect('/customers');
    }
}

<?php

namespace App\Repositories;

use App\Company;
use App\Customer;
use Cassandra\Custom;
use SoapClient;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all(){
        return Customer::orderBy('name','asc')
            //->where('is_active',1)
            ->with('company')
            ->get()
            ->map->format();
    }

    public function findById($customerId){

        return Customer::where('id',$customerId)
            ->with('company')
            ->firstOrFail()
            ->format();
    }

    public function store(){
        Customer::create(request()->except('_token'));
    }

    public function update($customerId){
        $customer = Customer::where('id',$customerId)->firstOrFail();
        $customer->update(request()->except('_token'));
    }

    public function delete($customerId){
        $customer = Customer::where('id',$customerId)->delete();

    }

    public function allCompanies(){
        return Company::all();
    }

    public function MernisControl(){
        if(Company::where('id',request()->input('company_id'))->first()->mernis_verification){
            return (new SoapClient('https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL'))
                ->TCKimlikNoDogrula([
                    "TCKimlikNo" => request()->input('identification_number'),
                    "Ad" => request()->input('name'),
                    "Soyad" => request()->input('last_name'),
                    "DogumYili" => request()->input('year_of_birth'),
                ])->TCKimlikNoDogrulaResult;
        }

        return true;
    }
}

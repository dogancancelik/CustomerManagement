<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById($customerId);

    public function update($customerId);

    public function delete($customerId);

    public function store();

    public function allCompanies();

    public function MernisControl();
}

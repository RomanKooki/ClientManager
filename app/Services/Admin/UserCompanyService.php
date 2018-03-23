<?php
/**
 * ClientManager
 *
 * @file UserCompanyService.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file UserCompanyService.php
 * @project ClientManager
 * @author Wayne Brummer
 */

    /**
     * Created by PhpStorm.
     * User: wayne
     * Date: 2018/03/23
     * Time: 10:33
     */

    namespace App\Services\Admin;


    use App\Company;
    use App\UserCompany;

    class UserCompanyService
    {

        /**
         * Makes an array of all the companies.
         * Then it adds the key linked if the user has been linked to that company.
         *
         * @param int $id
         * @return array
         */
        public function listLinkedCompanies(int $id = null)
        {
            $links = (new UserCompany)
                ->where('user_id', $id)
                ->pluck('company_id')
            ->toArray();
            $linked = ($links) ? $links : [];

            $companies = (new Company)->all();

            return $this->buildCompanyList($companies, $linked);
        }

        /**
         * Provides teh linking between Company and User
         *
         * @param $companies
         * @param $linked
         * @return array
         */
        private function buildCompanyList($companies, $linked)
        {
            $userCompanies = [];
            foreach ($companies as $company)
            {
                $comProfile['company_name'] = $company->name;
                $comProfile['company_id'] = $company->id;
                $comProfile['linked'] = (in_array($company->id, $linked)) ? true : false;

                $userCompanies[] = $comProfile;
            }
            return $userCompanies;
        }
    }
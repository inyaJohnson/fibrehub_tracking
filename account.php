<?php
include "prospect.php";
include "accountsearch.php";
include "template.php";
include "query.php";


if(empty($_POST['search'])){
    prospect();
}else{
    function dataSearch(array $data){
        $searchWords = explode(' ', $data['search']);
        $temp = $result = [];
        foreach ($searchWords as $word) {
            $query = new Querys();
            $temp[] = $query->prospectSearch($word);
        }

        foreach($temp as $resultSet) {
            foreach($resultSet as $record) {
                if(!in_array($record, $result)){
                    $result[] = $record;
                }
            }
        }
        return $result;        
    }

    $searchResult = dataSearch($_POST);
    searchedProspect($searchResult);
}


?>
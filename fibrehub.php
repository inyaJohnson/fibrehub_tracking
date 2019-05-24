<?php

session_start();
if(isset($_SESSION['user_id'])){
    header('Location: fibrehub.php');
}

include "prospect.php";
include "prospectsearch.php";
include "template.php";
include "query.php";

// works but too advanced
// if(!empty($_POST['search'])){
//     echo"YES";
// }else{
// prospect();
// }

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
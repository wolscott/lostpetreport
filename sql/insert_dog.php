<?php
/* here I have to parse each field listed in html into values appropriate for insertion to the db
 */

session_start();

include_once '../config/db.php';

$connection = connect();

//fields for insert statements
$fields = array();

//values for insert statements
$values = array();

//types for prepared statment
$types = array();

// html name: animalName
// sql field: AnimalName
// php variable: $animalName
if(isset($_POST['animalName'])){
    $fields[] = 'AnimalName';
    $values[] = mysqli_real_escape_string($connection, $_POST['animalName']);
    $types[] = 's';
}

// html name: sex
// html values: m, f
// sql field: Sex
// sql values: m, f
// php variable: $sex
if(isset($_POST['sex'])){
    $fields[] = 'Sex';
    $values[] = $_POST['sex'];
    $types[] = 's';
}

// html name: fixed
// html values: y, n
// sql field: Fixed
// sql values: y, n
// php variable: $fixed
if(isset($_POST['fixed'])){
    $fields[] = 'Fixed';
    $values[] = $_POST['fixed'];
    $types[] = 's';
}

// html name: breed
// html value: text field
// sql field: Breed
// sql value: varchar(255)
if(isset($_POST['breed'])){
    $fields[] = 'Breed';
    $values[] = $_POST['breed'];
    $types[] = 's';
}

// PURE BRED checkbox missing from form

//PRIMARY COLORS

// html name: primaryColor_black
// html value: on
// sql field: PrimaryColor_Black
if(isset($_POST['primaryColor_black'])){
    $fields[] = 'PrimaryColor_Black';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_grey
if(isset($_POST['primaryColor_grey'])){
    $fields[] = 'PrimaryColor_Grey';
    $values[] = 1;
    $types[] = 'i';
}


// html name: primaryColor_brown
if(isset($_POST['primaryColor_brown'])){
    $fields[] = 'PrimaryColor_Brown';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_red
if(isset($_POST['primaryColor_red'])){
    $fields[] = 'PrimaryColor_Red';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_yellow
if(isset($_POST['primaryColor_yellow'])){
    $fields[] = 'PrimaryColor_Yellow';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_white
if(isset($_POST['primaryColor_white'])){
    $fields[] = 'PrimaryColor_White';
    $values[] = 1;
    $types[] = 'i';
}

//SECONDARY COLORS

// html name: secondaryColor_black
// html value: on
// sql field: SecondaryColor_Black
if(isset($_POST['secondaryColor_black'])){
    $fields[] = 'SecondaryColor_Black';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_grey
if(isset($_POST['secondaryColor_grey'])){
    $fields[] = 'SecondaryColor_Grey';
    $values[] = 1;
    $types[] = 'i';
}


// html name: secondaryColor_brown
if(isset($_POST['secondaryColor_brown'])){
    $fields[] = 'SecondaryColor_Brown';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_red
if(isset($_POST['secondaryColor_red'])){
    $fields[] = 'SecondaryColor_Red';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_yellow
if(isset($_POST['secondaryColor_yellow'])){
    $fields[] = 'SecondaryColor_Yellow';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_white
if(isset($_POST['secondaryColor_white'])){
    $fields[] = 'SecondaryColor_White';
    $values[] = 1;
    $types[] = 'i';
}

// COAT

// html name: coat_short
// sql field: Coat_Short
if(isset($_POST['coat_short'])){
    $fields[] = 'Coat_Short';
    $values[] = 1;
    $types[] = 'i';
}

// html name: coat_medium
if(isset($_POST['coat_medium'])){
    $fields[] = 'Coat_Medium';
    $values[] = 1;
    $types[] = 'i';
}

// html name: coat_long
if(isset($_POST['coat_long'])){
    $fields[] = 'Coat_Long';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_wirey"
if(isset($_POST['coat_wirey'])){
    $fields[] = 'Coat_Wirey';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_curly"
if(isset($_POST['coat_curly'])){
    $fields[] = 'Coat_Curly';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_matted"
if(isset($_POST['coat_matted'])){
    $fields[] = 'Coat_Matted';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_shaved"
if(isset($_POST['coat_shaved'])){
    $fields[] = 'Coat_Shaved';
    $values[] = 1;
    $types[] = 'i';
}

// html name="size_small"
// sql Size_Small
if(isset($_POST['size_small'])){
    $fields[] = 'Size_Small';
    $values[] = 1;
    $types[] = 'i';
}
// html name="size_medium"
// sql Size_Medium
if(isset($_POST['size_medium'])){
    $fields[] = 'Size_Medium';
    $values[] = 1;
    $types[] = 'i';
}
    
// html name="size_large"
// sql Size_Large
if(isset($_POST['size_large'])){
    $fields[] = 'Size_Large';
    $values[] = 1;
    $types[] = 'i';
}

// html name="size_xlarge"
// sql field: Size_XLarge
if(isset($_POST['size_xlarge'])){
    $fields[] = 'Size_XLarge';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_puppy"
// sql: Age_Puppy TINYINT(1),
if(isset($_POST['age_puppy'])){
    $fields[] = 'Age_Puppy';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_youngAdult"
// sql: Age_YoungAdult TINYINT(1),
if(isset($_POST['age_youngAdult'])){
    $fields[] = 'Age_YoungAdult';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_adult"
// sql: Age_Adult TINYINT(1),
if(isset($_POST['age_adult'])){
    $fields[] = 'Age_Adult';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_senior"
// sql: Age_Senior TINYINT(1),
if(isset($_POST['age_senior'])){
    $fields[] = 'Age_Senior';
    $values[] = 1;
    $types[] = 'i';
}

// EARS

// html name="ears_cropped"
// sql: Ears_Cropped TINYINT(1),
if(isset($_POST['ears_cropped'])){
    $fields[] = 'Ears_Cropped';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_droopy"
// sql: Ears_Droopy TINYINT(1),
if(isset($_POST['ears_droopy'])){
    $fields[] = 'Ears_Droopy';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_erect"
// sql: Ears_Erect TINYINT(1),
if(isset($_POST['ears_erect'])){
    $fields[] = 'Ears_Erect';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_semiErect"
// sql: Ears_SemiErect TINYINT(1),
if(isset($_POST['ears_semiErect'])){
    $fields[] = 'Ears_SemiErect';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_folded"
// sql: Ears_Folded TINYINT(1),
if(isset($_POST['ears_folded'])){
    $fields[] = 'Ears_Folded';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_long"
// sql: Ears_Long TINYINT(1),
if(isset($_POST['ears_long'])){
    $fields[] = 'Ears_Long';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_notched"
// sql: Ears_Notched TINYINT(1),
if(isset($_POST['ears_notched'])){
    $fields[] = 'Ears_Notched';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_missing"
// sql: Ears_Missing TINYINT(1),
if(isset($_POST['ears_missing'])){
    $fields[] = 'Ears_Missing';
    $values[] = 1;
    $types[] = 'i';
}

// TAIL

// html name="tail_docked"
// sql: Tail_Docked
if(isset($_POST['tail_docked'])){
    $fields[] = 'Tail_Docked';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_short"
// sql: Tail_Short
if(isset($_POST['tail_short'])){
    $fields[] = 'Tail_Short';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_medium"
// sql: Tail_Medium
if(isset($_POST['tail_medium'])){
    $fields[] = 'Tail_Medium';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_long"
// sql: Tail_Long
if(isset($_POST['tail_long'])){
    $fields[] = 'Tail_Long';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_curled"
// sql: Tail_Curled
if(isset($_POST['tail_curled'])){
    $fields[] = 'Tail_Curled';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_none"
// sql: Tail_None
if(isset($_POST['tail_none'])){
    $fields[] = 'Tail_None';
    $values[] = 1;
    $types[] = 'i';
}

// COLLAR

if(isset($_POST['collar'])){
    $fields[] = 'HasCollar';
    $values[] = $_POST['collar'];
    $types[] = 's';
}
                
if(isset($_POST['collar_nylon'])){
    $fields[] = 'Collar_Nylon';
    $values[] = 1;
    $types[] = 'i';
} 
    
if(isset($_POST['collar_leather'])){
    $fields[] = 'Collar_Leather';
    $values[] = 1;
    $types[] = 'i';
}
    
if(isset($_POST['collar_other'])){
    $fields[] = 'Collar_Other';
    $values[] = 1;
    $types[] = 'i';
}              

if(isset($_POST['collar_color'])){
    $fields[] = 'Collar_Color';
    $values[] = $_POST['collar_color'];
    $types[] = 's';
}  

if(isset($_POST['collar_description'])){
    $fields[] = 'Collar_Description';
    $values[] = $_POST['collar_description'];
    $types[] = 's';
}  

// IDENTIFICIATION

if(isset($_POST['tags'])){
    $fields[] = 'HasTags';
    $values[] = $_POST['tags'];
    $types[] = 's';
}

          
// html name="tags_rabies"
if(isset($_POST['tags_rabies'])){
    $fields[] = 'Tags_Rabies';
    $values[] = 1;
    $types[] = 'i';
}        

// html name="tags_microchip"
if(isset($_POST['tags_microchip'])){
    $fields[] = 'Tags_Microchip';
    $values[] = 1;
    $types[] = 'i';
}        

// html name="tags_shelterID"
if(isset($_POST['tags_shelterID'])){
    $fields[] = 'Tags_ShelterID';
    $values[] = 1;
    $types[] = 'i';
}        
            
// html name="tags_personalID"
if(isset($_POST['tags_personalID'])){
    $fields[] = 'Tags_PersonalID';
    $values[] = 1;
    $types[] = 'i';
}        

if(isset($_POST['has_microchip'])){
    $fields[] = 'HasMicrochip';
    $values[] = $_POST['has_microchip'];
    $types[] = 's';
}           

if(isset($_POST['microchip_number'])){
    $fields[] = 'MicrochipNumber';
    $values[] = $_POST['microchip_number'];
    $types[] = 's';
}  
                         
//var_dump($fields);
//var_dump($values);
$fieldsString = join(',', $fields);
$valuesString = join(',', $values);
$typesString = implode($types);

/*
echo $fieldsString;
echo '<br>';
echo $valuesString;
echo '<br>';
echo $typesString;
echo '<br>';
*/

$placeHolders = array();

foreach($values as $v){
    $placeHolders[] = '?';
}

$placeholderString = join(',', $placeHolders);

$sql = "INSERT into dog ($fieldsString) VALUES ($placeholderString)";

if(!($stmt = $connection->prepare($sql))){
    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
}
else {
    //echo "Statement prepared: ";
    //echo $sql;
}

$params = array_merge(array($typesString), $values);

//var_dump($params);

foreach($params as &$param){
    $inputArray[] = &$param;
}

foreach($inputArray as $ref){
    //echo $ref;
}

call_user_func_array(array($stmt, 'bind_param'), $inputArray);

try {
    $stmt->execute();
    //echo "you did it!";
    $dogID = $connection->insert_id;
    echo "<div class='container text-center'>";
    echo "<h1>Report Submitted</h1>";
    echo "<h2> Dog ID: $dogID </h2>";
    echo "</div>";
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

//echo "wtf";


mysqli_close($connection);

?>
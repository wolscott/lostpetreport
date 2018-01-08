<?php
/* here I have to parse each field listed in html into values appropriate for insertion to the db
 */

session_start();

include_once '../config/db.php';

$connection = connect();

//fields for insert statements
$wheres = array();

//values for insert statements
$values = array();

//types for prepared statment
$types = array();

// html name: animalName
// sql field: AnimalName
// php variable: $animalName
if(isset($_POST['animalName']) && $_POST['animalName'] != ""){
    $wheres[] = 'AnimalName LIKE ?';
    $values[] = '%'.$_POST['animalName'].'%';
    $types[] = 's';
}

// html name: sex
// html values: m, f
// sql field: Sex
// sql values: m, f
// php variable: $sex
if(isset($_POST['sex'])){
    $wheres[] = 'Sex = ?';
    $values[] = $_POST['sex'];
    $types[] = 's';
}

// html name: fixed
// html values: y, n
// sql field: Fixed
// sql values: y, n
// php variable: $fixed
if(isset($_POST['fixed'])){
    $wheres[] = 'Fixed = ?';
    $values[] = $_POST['fixed'];
    $types[] = 's';
}

// html name: breed
// html value: text field
// sql field: Breed
// sql value: varchar(255)
if(isset($_POST['breed']) && $_POST['breed'] != ""){
    $wheres[] = 'Breed LIKE ?';
    $values[] = '%'.$_POST['breed'].'%';
    $types[] = 's';
}

// PURE BRED checkbox missing from form

//PRIMARY COLORS

// html name: primaryColor_black
// html value: on
// sql field: PrimaryColor_Black
if(isset($_POST['primaryColor_black'])){
    $wheres[] = 'PrimaryColor_Black = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_grey
if(isset($_POST['primaryColor_grey'])){
    $wheres[] = 'PrimaryColor_Grey = ?';
    $values[] = 1;
    $types[] = 'i';
}


// html name: primaryColor_brown
if(isset($_POST['primaryColor_brown'])){
    $wheres[] = 'PrimaryColor_Brown = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_red
if(isset($_POST['primaryColor_red'])){
    $wheres[] = 'PrimaryColor_Red = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_yellow
if(isset($_POST['primaryColor_yellow'])){
    $wheres[] = 'PrimaryColor_Yellow = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: primaryColor_white
if(isset($_POST['primaryColor_white'])){
    $wheres[] = 'PrimaryColor_White = ?';
    $values[] = 1;
    $types[] = 'i';
}

//SECONDARY COLORS

// html name: secondaryColor_black
// html value: on
// sql field: SecondaryColor_Black
if(isset($_POST['secondaryColor_black'])){
    $wheres[] = 'SecondaryColor_Black = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_grey
if(isset($_POST['secondaryColor_grey'])){
    $wheres[] = 'SecondaryColor_Grey = ?';
    $values[] = 1;
    $types[] = 'i';
}


// html name: secondaryColor_brown
if(isset($_POST['secondaryColor_brown'])){
    $wheres[] = 'SecondaryColor_Brown = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_red
if(isset($_POST['secondaryColor_red'])){
    $wheres[] = 'SecondaryColor_Red = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_yellow
if(isset($_POST['secondaryColor_yellow'])){
    $wheres[] = 'SecondaryColor_Yellow = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: secondaryColor_white
if(isset($_POST['secondaryColor_white'])){
    $wheres[] = 'SecondaryColor_White = ?';
    $values[] = 1;
    $types[] = 'i';
}

// COAT

// html name: coat_short
// sql field: Coat_Short
if(isset($_POST['coat_short'])){
    $wheres[] = 'Coat_Short = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: coat_medium
if(isset($_POST['coat_medium'])){
    $wheres[] = 'Coat_Medium = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name: coat_long
if(isset($_POST['coat_long'])){
    $wheres[] = 'Coat_Long = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_wirey"
if(isset($_POST['coat_wirey'])){
    $wheres[] = 'Coat_Wirey = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_curly"
if(isset($_POST['coat_curly'])){
    $wheres[] = 'Coat_Curly = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_matted"
if(isset($_POST['coat_matted'])){
    $wheres[] = 'Coat_Matted = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="coat_shaved"
if(isset($_POST['coat_shaved'])){
    $wheres[] = 'Coat_Shaved = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="size_small"
// sql Size_Small
if(isset($_POST['size_small'])){
    $wheres[] = 'Size_Small = ?';
    $values[] = 1;
    $types[] = 'i';
}
// html name="size_medium"
// sql Size_Medium
if(isset($_POST['size_medium'])){
    $wheres[] = 'Size_Medium = ?';
    $values[] = 1;
    $types[] = 'i';
}
    
// html name="size_large"
// sql Size_Large
if(isset($_POST['size_large'])){
    $wheres[] = 'Size_Large = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="size_xlarge"
// sql field: Size_XLarge
if(isset($_POST['size_xlarge'])){
    $wheres[] = 'Size_XLarge = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_puppy"
// sql: Age_Puppy TINYINT(1),
if(isset($_POST['age_puppy'])){
    $wheres[] = 'Age_Puppy = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_youngAdult"
// sql: Age_YoungAdult TINYINT(1),
if(isset($_POST['age_youngAdult'])){
    $wheres[] = 'Age_YoungAdult = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_adult"
// sql: Age_Adult TINYINT(1),
if(isset($_POST['age_adult'])){
    $wheres[] = 'Age_Adult = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="age_senior"
// sql: Age_Senior TINYINT(1),
if(isset($_POST['age_senior'])){
    $wheres[] = 'Age_Senior = ?';
    $values[] = 1;
    $types[] = 'i';
}

// EARS

// html name="ears_cropped"
// sql: Ears_Cropped TINYINT(1),
if(isset($_POST['ears_cropped'])){
    $wheres[] = 'Ears_Cropped = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_droopy"
// sql: Ears_Droopy TINYINT(1),
if(isset($_POST['ears_droopy'])){
    $wheres[] = 'Ears_Droopy = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_erect"
// sql: Ears_Erect TINYINT(1),
if(isset($_POST['ears_erect'])){
    $wheres[] = 'Ears_Erect = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_semiErect"
// sql: Ears_SemiErect TINYINT(1),
if(isset($_POST['ears_semiErect'])){
    $wheres[] = 'Ears_SemiErect = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_folded"
// sql: Ears_Folded TINYINT(1),
if(isset($_POST['ears_folded'])){
    $wheres[] = 'Ears_Folded = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_long"
// sql: Ears_Long TINYINT(1),
if(isset($_POST['ears_long'])){
    $wheres[] = 'Ears_Long = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_notched"
// sql: Ears_Notched TINYINT(1),
if(isset($_POST['ears_notched'])){
    $wheres[] = 'Ears_Notched = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="ears_missing"
// sql: Ears_Missing TINYINT(1),
if(isset($_POST['ears_missing'])){
    $wheres[] = 'Ears_Missing = ?';
    $values[] = 1;
    $types[] = 'i';
}

// TAIL

// html name="tail_docked"
// sql: Tail_Docked
if(isset($_POST['tail_docked'])){
    $wheres[] = 'Tail_Docked = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_short"
// sql: Tail_Short
if(isset($_POST['tail_short'])){
    $wheres[] = 'Tail_Short = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_medium"
// sql: Tail_Medium
if(isset($_POST['tail_medium'])){
    $wheres[] = 'Tail_Medium = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_long"
// sql: Tail_Long
if(isset($_POST['tail_long'])){
    $wheres[] = 'Tail_Long = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_curled"
// sql: Tail_Curled
if(isset($_POST['tail_curled'])){
    $wheres[] = 'Tail_Curled = ?';
    $values[] = 1;
    $types[] = 'i';
}

// html name="tail_none"
// sql: Tail_None
if(isset($_POST['tail_none'])){
    $wheres[] = 'Tail_None = ?';
    $values[] = 1;
    $types[] = 'i';
}

// COLLAR

if(isset($_POST['collar'])){
    $wheres[] = 'HasCollar = ?';
    $values[] = $_POST['collar'];
    $types[] = 's';
}
                
if(isset($_POST['collar_nylon'])){
    $wheres[] = 'Collar_Nylon = ?';
    $values[] = 1;
    $types[] = 'i';
} 
    
if(isset($_POST['collar_leather'])){
    $wheres[] = 'Collar_Leather = ?';
    $values[] = 1;
    $types[] = 'i';
}
    
if(isset($_POST['collar_other'])){
    $wheres[] = 'Collar_Other = ?';
    $values[] = 1;
    $types[] = 'i';
}              

if(isset($_POST['collar_color']) && $_POST['collar_color'] != ""){
    $wheres[] = 'Collar_Color LIKE ?';
    $values[] = '%'.$_POST['collar_color'].'%';
    $types[] = 's';
}  

if(isset($_POST['collar_description']) && $_POST['collar_description'] != ""){
    $wheres[] = 'Collar_Description LIKE ?';
    $values[] = '%'.$_POST['collar_description'].'%';
    $types[] = 's';
}  

// IDENTIFICIATION

if(isset($_POST['tags'])){
$wheres[] = 'HasTags = ?';
    $values[] = $_POST['tags'];
    $types[] = 's';
}

          
// html name="tags_rabies"
if(isset($_POST['tags_rabies'])){
    $wheres[] = 'Tags_Rabies = ?';
    $values[] = 1;
    $types[] = 'i';
}        

// html name="tags_microchip"
if(isset($_POST['tags_microchip'])){
    $wheres[] = 'Tags_Microchip = ?';
    $values[] = 1;
    $types[] = 'i';
}        

// html name="tags_shelterID"
if(isset($_POST['tags_shelterID'])){
    $wheres[] = 'Tags_ShelterID = ?';
    $values[] = 1;
    $types[] = 'i';
}        
            
// html name="tags_personalID"
if(isset($_POST['tags_personalID'])){
    $wheres[] = 'Tags_PersonalID = ?';
    $values[] = 1;
    $types[] = 'i';
}        

if(isset($_POST['has_microchip'])){
    $wheres[] = 'HasMicrochip = ?';
    $values[] = $_POST['has_microchip'];
    $types[] = 's';
}           

if(isset($_POST['microchip_number']) && $_POST['microchip_number'] != ""){
    $wheres[] = 'MicrochipNumber LIKE ?';
    $values[] = $_POST['microchip_number'];
    $types[] = 's';
}  
                         
//var_dump($wheres);
//var_dump($values);
$wheresString = join(' AND ', $wheres);
$valuesString = join(',', $values);
$typesString = implode($types);

/*
echo $wheresString;
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
/*
$sql = "SELECT DogID, AnimalName, Breed, PrimaryColor_Black, PrimaryColor_Grey, PrimaryColor_Brown, PrimaryColor_Red, PrimaryColor_Yellow, PrimaryColor_White,
        SecondaryColor_Black, SecondaryColor_Grey, SecondaryColor_Brown, SecondaryColor_Red, SecondaryColor_Yellow, SecondaryColor_White, 
        FROM dog 
        WHERE ($wheresString)";
*/

$sql = "SELECT DogID, AnimalName, Sex, Breed, PrimaryColor_Black, PrimaryColor_Grey, PrimaryColor_Brown, PrimaryColor_Red, PrimaryColor_Yellow, PrimaryColor_White,
        SecondaryColor_Black, SecondaryColor_Grey, SecondaryColor_Brown, SecondaryColor_Red, SecondaryColor_Yellow, SecondaryColor_White 
        FROM dog 
        WHERE ($wheresString)";


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

echo "<div class='container'><br>";
echo "<div class='col-lg-1'>DogID</div><div class='col-lg-3'>Dog Name</div><div class='col-lg-1'>Sex</div><div class='col-lg-3'>Dog Breed</div><div class='col-lg-4'>Dog Colors</div>";

try {
    $stmt->execute();
    //echo "you did it!";

    $stmt->bind_result($dogID, $name, $sex, $breed, $pBlack, $pGrey, $pBrown, $pRed, $pYellow, $pWhite, $sBlack, $sGrey, $sBrown, $sRed, $sYellow, $sWhite);
    while( $stmt->fetch() ){
        $colors = array();
        
        if($pBlack != NULL || $sBlack != NULL){
            $colors[] = 'Black';
        }
        if($pGrey != NULL || $sGrey != NULL){
            $colors[] = 'Grey';
        }
        if($pBrown != NULL || $sBrown != NULL){
            $colors[] = 'Brown';
        }
        if($pRed != NULL || $sRed != NULL){
            $colors[] = 'Red';
        }
        if($pYellow != NULL || $sYellow != NULL){
            $colors[] = 'Yellow';
        }
        if($pWhite != NULL || $sWhite != NULL){
            $colors[] = 'White';
        }
        $colors = join(', ', $colors);
        echo "<br><div class='well row'>";
        echo "<div class='col-lg-1'>$dogID</div><div class='col-lg-3'>$name</div><div class='col-lg-1'>$sex</div><div class='col-lg-3'>$breed</div><div class='col-lg-4'>$colors</div>";
        echo "</div>";
    }
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

echo "</div>";
//echo "wtf";


mysqli_close($connection);

?>
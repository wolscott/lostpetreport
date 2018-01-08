/* When completed, this file can be read with mysql to initialize the database structure.
   Running this file will wipe the entire db and reinitialize it, 
   SO DON'T DO IT IF YOU DON'T WANT TO WHIPE THE DB!!!
*/

/* this file does not specify a DB to use. You must pipe it in with the mysql command like this
     mysql -u <username> -p <DBName> < dbinit.sql 
*/

/* drop tables for clean slate. Order is important because it will complain about 
   foreign key constraints if you try to drop them in the wrong order
*/
DROP TABLE IF EXISTS dog;

CREATE TABLE dog (
    DogID int NOT NULL AUTO_INCREMENT,
    AnimalName varchar(255),
    Sex varchar(1), /* CHECK Sex IN ('m', 'f'), */
    Fixed varchar(1), /* CHECK Fixed IN ('y', 'n'), */
    Breed varchar(255),
    Purebred varchar(1), /* CHECK Fixed IN ('y', 'n'), */
    PrimaryColor_Black TINYINT(1),
    PrimaryColor_Grey TINYINT(1),
    PrimaryColor_Brown TINYINT(1),
    PrimaryColor_Red TINYINT(1),
    PrimaryColor_Yellow TINYINT(1),
    PrimaryColor_White TINYINT(1),
    SecondaryColor_Black TINYINT(1),
    SecondaryColor_Grey TINYINT(1),
    SecondaryColor_Brown TINYINT(1),
    SecondaryColor_Red TINYINT(1),
    SecondaryColor_Yellow TINYINT(1),
    SecondaryColor_White TINYINT(1),
    Coat_Short TINYINT(1),
    Coat_Medium TINYINT(1),
    Coat_Long TINYINT(1),
    Coat_Wirey TINYINT(1),
    Coat_Curly TINYINT(1),
    Coat_Matted TINYINT(1),
    Coat_Shaved TINYINT(1),
    Size_Small TINYINT(1),
    Size_Medium TINYINT(1),
    Size_Large TINYINT(1),
    Size_XLarge TINYINT(1),
    Age_Puppy TINYINT(1),
    Age_YoungAdult TINYINT(1),
    Age_Adult TINYINT(1),
    Age_Senior TINYINT(1),
    Ears_Cropped TINYINT(1),
    Ears_Droopy TINYINT(1),
    Ears_Erect TINYINT(1),
    Ears_SemiErect TINYINT(1),
    Ears_Folded TINYINT(1),
    Ears_Long TINYINT(1),
    Ears_Notched TINYINT(1),
    Ears_Missing TINYINT(1),
    Tail_Docked TINYINT(1),
    Tail_Short TINYINT(1),
    Tail_Medium TINYINT(1),
    Tail_Long TINYINT(1),
    Tail_Curled TINYINT(1),
    Tail_None TINYINT(1),
    HasCollar varchar(1), /* CHECK Fixed IN ('y', 'n'), */
    Collar_Nylon TINYINT(1),
    Collar_Leather TINYINT(1),
    Collar_Other TINYINT(1),
    Collar_Color varchar(255),
    Collar_Description varchar(255),
    HasTags varchar(1), /* CHECK Fixed IN ('y', 'n'), */
    Tags_Rabies TINYINT(1),
    Tags_Microchip TINYINT(1),
    Tags_ShelterID TINYINT(1),
    Tags_PersonalID TINYINT(1),
    HasMicrochip varchar(1), /* CHECK Fixed IN ('y', 'n'), */
    MicrochipNumber varchar(255),
    /* all these should be in the report table
    DateLost date,
    TimeLost time,
    MethodOfReport varchar(255), /* CHECK IN ("phone", "email", "person"), */
    /* except this one, which should be in the notes table
    UniqueFeaturesImportantInformation varchar(1000), */
    PRIMARY KEY (DogID)
);

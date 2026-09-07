<?php
$recipe = [
'title' => 'Cassoulet',
'recipe' => 'Etape 1 : flageolets, ...',
'author' => 'john.doe@exemple.com',
'enabled' => true,
];
?>
<?php
function isValidRecipe(array $recipe) : bool {
if (array_key_exists('is_enabled', $recipe)) {
$isEnabled = $recipe['is_enabled'];
} else {
$isEnabled = false;
}
return $isEnabled;
}
// 2 exemples
$romanSalad = [
'title' => 'Salade Romaine',
'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
'author' => 'laurene.castor@exemple.com',
'is_enabled' => true,
];
$sushis = [
'title' => 'Sushis',
'recipe' => 'Etape 1 : du saumon ; Etape 2 : du riz',
'author' => 'laurene.castor@exemple.com',
'is_enabled' => false,
];
// Répond true !
$isRomandSaladValid = isValidRecipe($romanSalad);
// Répond false !
$isSushisValid = isValidRecipe($sushis);
?>
<?php

// Déclaration du tableau des recettes
 $recipes = [
['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
['Couscous','[...]','mickael.andrieu@exemple.com',false,],
];

?>
<?php include('header.php'); ?>
<?php
function displayAuthor(string $authorEmail, array $users) : string
{
for ($i = 0; $i < count($users); $i++) {
$author = $users[$i];
if ($authorEmail === $author['email']) {
return $author['full_name'] . '(' . $author['age'] . ' ans)';
}
}
}
?>
<?php
function getRecipes(array $recipes) : array {
$validRecipes = [];
foreach($recipes as $recipe) {
if (isValidRecipe($recipe)) {
$validRecipes[] = $recipe;
}
}
return $validRecipes;
}
// construire l'affichage HTML des recettes
foreach(getRecipes($recipes) as $recipe) {
// echo $recipe['title'] ..
}
?>
<?php
$mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
$mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
$laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];
$users = [$mickael, $mathieu, $laurene];
echo $users[1][1]; // "mathieu.nebra@exemple.com"
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Affichage des recettes</title>
    </head>
    <body>
        <ul>
            <?php for ($lines = 0; $lines <= 1; $lines++): ?>
            <li>
                <?php echo $recipes[$lines][0] . ' (' . $recipes[$lines][2] . ')';?>
            </li>
            <?php endfor; ?>
        </ul>
    </body>
</html>
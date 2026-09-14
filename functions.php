<?php
// functions.php

function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $author) {
        if ($authorEmail === $author['email']) {

            if (isset($author['fullname'])) {
                return (string) $author['fullname'];
            }


            return (string) $author['email'];
        }
    }

    return 'Auteur inconnu';
}
function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}
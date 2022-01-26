const search = document.querySelector('input[name="search"]');
const recipeContainer = document.querySelector(".recipes");

search.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function(recipes) {
            recipeContainer.innerHTML = "";
            loadRecipes(recipes)
        });
    }
});

function loadRecipes(recipes) {
    recipes.forEach(recipe => {
        console.log(recipe);
        createRecipe(recipe);
    })
}

function createRecipe(recipe) {
    const template = document.querySelector("#recipe-template");
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector(".photo");
    image.src = `/public/uploads/${recipe.image}`;
    const title = clone.querySelector(".title");
    title.innerHTML = recipe.title;
    const prepareTime = clone.querySelector(".text"); //34 minuta

    // const ing1 = clone.querySelector("#ing1");
    // ing1.innerHTML = recipe.
    // const ing2 = clone.querySelector("#ing2");
    // ing2.innerHTML =
    // const ing3 = clone.querySelector("#ing3");
    // ing3.innerHTML = ;

    recipeContainer.appendChild(clone);
}
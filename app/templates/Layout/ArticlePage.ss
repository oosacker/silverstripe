<main role="main" class="container main-container">
    <h1 class="mt-5">$Title</h1>
    <div class="border bg-light rounded p-3 mb-3">
        <p>$Content</p>
        <% with $Photo %>
            <img src="$URL" class="img-fluid" alt="blog image" />
        <% end_with %>
    </div>
    <small>Page last updated by $getName() on $LastEdited().Nice()</small>
<main role="main" class="container main-container">
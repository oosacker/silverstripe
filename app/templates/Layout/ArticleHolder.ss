<main role="main" class="container main-container">
    <h1 class="mt-5">$Title</h1>
    $Content
    <% loop $Children %>
        <div class="border bg-light rounded p-3 mb-3">
            <h3>$Title</h3>
            <a href="$Link">Click here</a>
        </div>
    <% end_loop %>
<main role="main" class="container main-container">
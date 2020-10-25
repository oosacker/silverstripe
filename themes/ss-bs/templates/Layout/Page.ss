<% include Header %>

<main role="main" class="container main-container">
	<% if $SideBar %>
		<% include SideBar %>
	<% end_if %>

	<h1 class="mt-5">$Title</h1>
	$Content
	$Form
	$CommentsForm
</main>

<% include Footer %>



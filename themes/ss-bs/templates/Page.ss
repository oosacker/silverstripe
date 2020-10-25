<!DOCTYPE html>
<html lang="$ContentLocale">

  <head>
    <% base_tag %>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      <% if $URLSegment == 'home' %>$SiteConfig.Title<% else %><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> - $SiteConfig.Title<% end_if %>
    </title>
    <% require css('themes/ss-bs/css/style.css') %>
  </head>

  <body class="$ClassName<% if not $Menu(2) %> no-sidebar<% end_if %>" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>

    <% include Header %>
    
    <main role="main" class="container main-container">
      <% if $SideBar %>
        <% include SideBar %>
      <% end_if %>

    $Layout
    <%-- $Form --%>
    <%-- $CommentsForm --%>
  </main>

  <% include Footer %>

  </body>
</html>
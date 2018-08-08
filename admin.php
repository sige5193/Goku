<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goku</title>
    <link href="/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body style="padding-top:50px;">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Goku</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Admin</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Michel &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Setting</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <br>
          <div class="list-group">
            <a href="#" class="list-group-item active">Projects</a>
            <a href="#" class="list-group-item">Users</a>
        </div>
        </div>
        <div class="col-md-10">
          <table class="table table-bordered table-hover">
            <caption>Projects</caption>
            <thead>
              <tr>
                <th>Name</th>
                <th>Id</th>
                <th>Description</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Suanhetao</td>
                <td>suanhetao</td>
                <td>dsfa sdjkf ah sdlkfjashdfl aksjd fhalsdkjf halsdk.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs">Delete</button>
                  <button class="btn btn-default btn-xs">Deactive/Active</button>
                </td>
              </tr>
              <tr>
                <td>Suanhetao</td>
                <td>suanhetao</td>
                <td>dsfa sdjkf ah sdlkfjashdfl aksjd fhalsdkjf halsdk.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs">Delete</button>
                  <button class="btn btn-default btn-xs">Deactive/Active</button>
                </td>
              </tr>
              <tr>
                <td>Suanhetao</td>
                <td>suanhetao</td>
                <td>dsfa sdjkf ah sdlkfjashdfl aksjd fhalsdkjf halsdk.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs">Delete</button>
                  <button class="btn btn-default btn-xs">Deactive/Active</button>
                </td>
              </tr>
              <tr>
                <td>Suanhetao</td>
                <td>suanhetao</td>
                <td>dsfa sdjkf ah sdlkfjashdfl aksjd fhalsdkjf halsdk.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs">Delete</button>
                  <button class="btn btn-default btn-xs">Deactive/Active</button>
                </td>
              </tr>
              <tr>
                <td>Suanhetao</td>
                <td>suanhetao</td>
                <td>dsfa sdjkf ah sdlkfjashdfl aksjd fhalsdkjf halsdk.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs">Delete</button>
                  <button class="btn btn-default btn-xs">Deactive/Active</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
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
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">Trigger</a></li>
            <li role="presentation"><a href="#">Processor</a></li>
          </ul>
          <br>
          <div class="list-group">
            <a href="#" class="list-group-item active">Suanhetao</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
            <a href="#" class="list-group-item" data-toggle="modal" data-target="#dlg-new-project">New Project</a>
        </div>
        </div>
        <div class="col-md-10">
          <br>
          <p>
            <strong>Suanhetao</strong>
            <small>(michael.suanhetao)</small>
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
          </p>
          <p>description od proejct sd, bf pdf fbyfog asdfasdf asdf adsf asdf asdf adsf adsf ba dfua idfa hdf adf adf adsf adf adsf asdf asdf asdf asd fuewrqywer qwer qewr we</p>
          
          <table class="table table-striped table-bordered table-hover">
            <caption>Events</caption>
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
                <td>Sport Published</td>
                <td>sport.published</td>
                <td>trigged after done publish sport on suanhetao.</td>
                <td>
                  <button class="btn btn-default btn-xs">View</button>
                  <button class="btn btn-default btn-xs">Edit</button>
                  <button class="btn btn-default btn-xs">Delete</button>
                  <button class="btn btn-default btn-xs">Enable/Disable</button>
                  <button class="btn btn-default btn-xs">History</button>
                  <button class="btn btn-default btn-xs">Processors</button>
                </td>
              </tr>
            </tbody>
          </table>
          <p><button class="btn btn-default btn-xs">Add Event</button></p>
        </div>
      </div>
    </div>

    <!-- Dialog for creating new project -->
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-new-project">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Project</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Poject Name">
              </div>
              <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" placeholder="Project Id">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
      </form>
    </div>


  </body>
</html>
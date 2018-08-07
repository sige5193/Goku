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
                <li><a href="#" data-toggle="modal" data-target="#dlg-user-profile">Profile</a></li>
                <li><a href="#" data-toggle="modal" data-target="#dlg-user-setting">Setting</a></li>
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
            <li role="presentation"><a href="#">Trigger</a></li>
            <li role="presentation" class="active"><a href="#">Processor</a></li>
          </ul>
          <br>
          <div class="list-group">
            <a href="#" class="list-group-item active">Suanhetao</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
            <a href="#" class="list-group-item" data-toggle="modal" data-target="#dlg-saerch-project">Search Project</a>
        </div>
        </div>
        <div class="col-md-10">
          <br>
          <p>
            <strong>Suanhetao</strong>
            <small>(michael.suanhetao)</small>
          </p>
          <p>description od proejct sd, bf pdf fbyfog asdfasdf asdf adsf asdf asdf adsf adsf ba dfua idfa hdf adf adf adsf adf adsf asdf asdf asdf asd fuewrqywer qwer qewr we</p>
          
          <table class="table table-bordered table-hover">
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
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event-processor">Processors</button>
                </td>
              </tr>
              <tr>
                <td>Sport Published</td>
                <td>sport.published</td>
                <td>trigged after done publish sport on suanhetao.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event-processor">Processors</button>
                </td>
              </tr>
              <tr>
                <td>Sport Published</td>
                <td>sport.published</td>
                <td>trigged after done publish sport on suanhetao.</td>
                <td>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event">View</button>
                  <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-view-event-processor">Processors</button>
                </td>
              </tr>
            </tbody>
          </table>
          <p><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#dlg-new-processor">Add Event</button></p>
        </div>
      </div>
    </div>

    <!-- Dialog for creating search project -->
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-saerch-project">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Search Project</h4>
          </div>
          <div class="modal-body">
              <form action="">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search Project">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Search</button>
                  </span>
                </div>
              </div>
              </form>
              
              <table class="table table-bordered table-hover">
                <thead>
                   <tr>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Operation</th>
                   </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Suanhetao</td>
                    <td>Adsa dasd asd hasu ashdfi ausdf sdasd fas</td>
                    <td>
                      <button class="btn btn-xs btn-default">Add</button>
                    </td>
                  </tr>
                  <tr>
                    <td>dsfa sd s</td>
                    <td>Adsa dasd asd hasu ashdfi ausdf sdasd fas</td>
                    <td>
                      <button 
                        class="btn btn-xs btn-default"
                        data-dismiss="modal"
                        data-toggle="modal" 
                        data-target="#dlg-project-apply"
                      >Apply</button>
                    </td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Dialog for creating new event -->
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-project-apply">
      <form>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Apply For Project</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Reason : </label>
              <textarea class="form-control"></textarea>
            </div>
            <label>Events : </label>
            <div class="checkbox">
              <label> <input type="checkbox"> Event 001  <small>ssada sd ASAsdg dfg sdfg sdfg sdfg </small></label>
            </div>
            <div class="checkbox">
              <label> <input type="checkbox"> Event 002 <small>ssada sd ASAsdg dfg sdfg sdfg sdfg </small> </label>
            </div>
            <div class="checkbox">
              <label> <input type="checkbox"> Event 003 <small>ssada sd ASAsdg dfg sdfg sdfg sdfg </small> </label>
            </div>
            <div class="checkbox">
              <label> <input type="checkbox"> Event 004 <small>ssada sd ASAsdg dfg sdfg sdfg sdfg </small> </label>
            </div>
          </div>
          <div class="modal-footer">
            <button 
              type="button" 
              class="btn btn-default" 
              data-dismiss="modal"
              data-toggle="modal" 
              data-target="#dlg-saerch-project"
            >Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
      </form>
    </div>

 <!-- Dialog for view event -->
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-view-event-processor">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Event Processors</h4>
          </div>
          <div class="modal-body">
          
          <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Processor</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Suanhetao Sina</td>
                  <td>
                    <button class="btn btn-default btn-xs">Delete</button>
                    <button class="btn btn-default btn-xs" data-dismiss="modal" data-toggle="modal" data-target="#dlg-new-processor">Edit</button>
                    <button class="btn btn-default btn-xs">Disable</button>
                    <button class="btn btn-default btn-xs" data-dismiss="modal" data-toggle="modal" data-target="#dlg-view-processor-history">History</button>
                  </td>
                </tr>
                <tr>
                  <td>Suanhetao SMS</td>
                  <td>
                    <button class="btn btn-default btn-xs">Delete</button>
                    <button class="btn btn-default btn-xs" data-dismiss="modal" data-toggle="modal" data-target="#dlg-new-processor">Edit</button>
                    <button class="btn btn-default btn-xs" >Enable</button>
                    <button class="btn btn-default btn-xs" data-dismiss="modal" data-toggle="modal" data-target="#dlg-view-processor-history">History</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-new-processor">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Processor</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Name</label>
                <select class="form-control">
                  <option>select event ...</option>
                  <option>Event 001</option>
                  <option>Evetnt 002 </option>
                  <option>sfs df </option>
                </select>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Event Name">
              </div>
              <div class="form-group">
                <label>Type</label>
                <select class="form-control">
                  <option>select event ...</option>
                  <option>HTTP</option>
                  <option>SCOKET</option>
                </select>
              </div>
              <div class="form-group">
                <label>URL</label>
                <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">POST <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">POST</a></li>
          <li><a href="#">GET</a></li>
          <li><a href="#">PUT</a></li>
          <li><a href="#">DELETE</a></li>
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" aria-label="...">
    </div><!-- /input-group -->
              </div>
              <div class="form-group">
                <label>Public Key</label>
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

<!-- Dialog for event history -->
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-view-processor-history">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Processor History</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Message</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2018-12-15 22:22:22</td>
                  <td>Success</td>
                  <td>10 poepoefsd afsd asd ads </td>
                  <td>
                    <button class="btn btn-default btn-xs">Retry</button>
                  </td>
                </tr>
                <tr>
                  <td>2018-12-15 22:22:22</td>
                  <td>Failed</td>
                  <td>Openid expired</td>
                  <td>
                    <button class="btn btn-default btn-xs">Retry</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button 
              type="button" 
              class="btn btn-default" 
              data-dismiss="modal" 
              data-toggle="modal" 
              data-target="#dlg-view-event-processor"
          >Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>

    <!-- Dialog for view event -->
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-view-event">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Event Information</h4>
          </div>
          <div class="modal-body">
              <p>Name: Sport Published</p>
              <p>Id: sport.published</p>
              <p>Description : sdf asdf ad fasdf adsf adsf asdf awe fa asdf asdf </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-user-setting">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Setting</h4>
          </div>
          <div class="modal-body">
          
          <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Password</a></li>
</ul>
         
         <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Old Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
  </form>
  
          
          
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="dlg-user-profile">
      <form>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Profile</h4>
          </div>
          <div class="modal-body">
          
         <form>
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="password" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
  </form>
  
          
          
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>

  </body>
</html>
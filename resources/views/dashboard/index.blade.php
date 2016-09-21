@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    General Table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th> Company</th>
                            <th class="hidden-phone">Descrition</th>
                            <th>Profit</th>
                            <th>Status</th>
                            <th>Progress</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="#">Graphics</a></td>
                            <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                            <td>1320.00$ </td>
                            <td><span class="label label-info label-mini">Due</span></td>
                            <td>
                                <div class="progress progress-striped progress-xs">
                                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    ThemeBucket
                                </a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dorolo</td>
                            <td>556.00$ </td>
                            <td><span class="label label-warning label-mini">Due</span></td>
                            <td>
                                <div class="progress progress-striped progress-xs">
                                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-danger">
                                        <span class="sr-only">70% Complete (success)</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    XYZ
                                </a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dorolo</td>
                            <td>13240.00$ </td>
                            <td><span class="label label-success label-mini">Paid</span></td>
                            <td>
                                <div class="progress progress-striped progress-xs">
                                    <div style="width: 55%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                        <span class="sr-only">55% Complete (success)</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    BCSE
                                </a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dorolo</td>
                            <td>3455.50$ </td>
                            <td><span class="label label-danger label-mini">Paid</span></td>
                            <td>
                                <div class="progress progress-striped progress-xs">
                                    <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-info">
                                        <span class="sr-only">90% Complete (success)</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#">AVC Ltd</a></td>
                            <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                            <td>110.00$ </td>
                            <td><span class="label label-primary label-mini">Due</span></td>
                            <td>
                                <div class="progress progress-striped progress-xs">
                                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                                        <span class="sr-only">60% Complete (success)</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    Themeforest
                                </a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dorolo</td>
                            <td>456.00$ </td>
                            <td><span class="label label-warning label-mini">Due</span></td>
                            <td>
                                <div class="progress progress-striped progress-xs">
                                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-danger">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Basic Table
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                </header>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Striped Table
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                </header>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading no-border">
                    Border Table
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="2">1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@TwBootstrap</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Hover Table
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                </header>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Jane Doe</td>
                            <td>Mosa</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
    </section>
    </section>
    <!--main content end-->
    <!--right sidebar start-->
    <div class="right-sidebar">
        <div class="search-row">
            <input type="text" placeholder="Search" class="form-control">
        </div>
        <div class="right-stat-bar">
            <ul class="right-side-accordion">
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head red-bg active clearfix">
                        <span class="pull-left">work progress (5)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row side-mini-stat clearfix">
                                <div class="side-graph-info">
                                    <h4>Target sell</h4>
                                    <p>
                                        25%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="target-sell">
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info">
                                    <h4>product delivery</h4>
                                    <p>
                                        55%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="p-delivery">
                                        <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info payment-info">
                                    <h4>payment collection</h4>
                                    <p>
                                        25%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="p-collection">
						<span class="pc-epie-chart" data-percent="45">
						<span class="percent"></span>
						</span>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info">
                                    <h4>delivery pending</h4>
                                    <p>
                                        44%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="d-pending">
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="col-md-12">
                                    <h4>total progress</h4>
                                    <p>
                                        50%, Deadline 12 june 13
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                            <span class="sr-only">50% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head terques-bg active clearfix">
                        <span class="pull-left">contact online (5)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Jonathan Smith</a></h4>
                                    <p>
                                        Work for fun
                                    </p>
                                </div>
                                <div class="user-status text-danger">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Anjelina Joe</a></h4>
                                    <p>
                                        Available
                                    </p>
                                </div>
                                <div class="user-status text-success">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/chat-avatar2.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">John Doe</a></h4>
                                    <p>
                                        Away from Desk
                                    </p>
                                </div>
                                <div class="user-status text-warning">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Mark Henry</a></h4>
                                    <p>
                                        working
                                    </p>
                                </div>
                                <div class="user-status text-info">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Shila Jones</a></h4>
                                    <p>
                                        Work for fun
                                    </p>
                                </div>
                                <div class="user-status text-danger">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <p class="text-center">
                                <a href="#" class="view-btn">View all Contacts</a>
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head purple-bg active">
                        <span class="pull-left"> recent activity (3)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        just now
                                    </p>
                                    <p>
                                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        2 min ago
                                    </p>
                                    <p>
                                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        1 day ago
                                    </p>
                                    <p>
                                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head yellow-bg active">
                        <span class="pull-left"> shipment status</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="col-md-12">
                                <div class="prog-row">
                                    <p>
                                        Full sleeve baby wear (SL: 17665)
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="prog-row">
                                    <p>
                                        Full sleeve baby wear (SL: 17665)
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
@stop

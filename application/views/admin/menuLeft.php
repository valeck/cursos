 <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?=base_url('assets/img/user.gif')?>">
              <span class="label label-danger user-label">16</span>
            </a>
            <div class="media-body">
              <h5 class="media-heading"><?=$this->session->username;?></h5>
              <ul class="list-unstyled user-info">
                <li> <a href=""><?=$this->session->type;?></a>  </li>
                <li>Last Access :
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i><?=$this->session->last_access?></small>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>
          <li class="">
            <a href="<?=base_url('index.php/admin/dashboard')?>">
              <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
            </a>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span class="link-title">Usuarios</span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="<?=base_url('index.php/admin/admins')?>">
                <i class="fa fa-angle-right"></i>&nbsp; Administradores </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/admin/users')?>">
                <i class="fa fa-angle-right"></i>&nbsp; Usuarios </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-building "></i>
              <span class="link-title">Layouts</span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Boxed Layout </a>
              </li>
              <li>
                <a href="fixed-header-boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 Boxed Layout &amp;
 Fixed Header </a>
              </li>
              <li>
                <a href="fixed-header-fixed-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Header and Fixed Mini Menu </a>
              </li>
              <li>
                <a href="fixed-header-menu.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 Fixed Header &amp;
 Menu </a>
              </li>
              <li>
                <a href="fixed-header-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 Fixed Header &amp;
 Mini Menu </a>
              </li>
              <li>
                <a href="fixed-header.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Header </a>
              </li>
              <li>
                <a href="fixed-menu-boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 Boxed Layout &amp;
 Fixed Menu </a>
              </li>
              <li>
                <a href="fixed-menu.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Fixed Menu </a>
              </li>
              <li>
                <a href="fixed-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 Fixed &amp;
 Mini Menu </a>
              </li>
              <li>
                <a href="fxhmoxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 Boxed and Fixed Header &amp;
 Nav </a>
              </li>
              <li>
                <a href="no-header-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 No Header &amp;
 Sidebars </a>
              </li>
              <li>
                <a href="no-header.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Header </a>
              </li>
              <li>
                <a href="no-left-right-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 No Left &amp;
 Right Sidebar </a>
              </li>
              <li>
                <a href="no-left-sidebar-main-search.html">
                  <i class="fa fa-angle-right"></i>&nbsp;
 No Left Sidebar &amp;
 Main Search </a>
              </li>
              <li>
                <a href="no-left-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Left Sidebar </a>
              </li>
              <li>
                <a href="no-main-search.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Main Search </a>
              </li>
              <li>
                <a href="no-right-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp; No Right Sidebar </a>
              </li>
              <li>
                <a href="sm.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Mini Sidebar </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span class="link-title">Components</span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="bgcolor.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Bg Color </a>
              </li>
              <li>
                <a href="bgimage.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Bg Image </a>
              </li>
              <li>
                <a href="button.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Buttons </a>
              </li>
              <li>
                <a href="icon.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Icon </a>
              </li>
              <li>
                <a href="pricing.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Pricing Table </a>
              </li>
              <li>
                <a href="progress.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Progress </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-pencil"></i>
              <span class="link-title">
            Forms
    </span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="form-general.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form General </a>
              </li>
              <li>
                <a href="form-validation.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form Validation </a>
              </li>
              <li>
                <a href="form-wizard.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form Wizard </a>
              </li>
              <li>
                <a href="form-wysiwyg.html">
                  <i class="fa fa-angle-right"></i>&nbsp; Form WYSIWYG </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="table.html">
              <i class="fa fa-table"></i>
              <span class="link-title">Tables</span>
            </a>
          </li>
          <li>
            <a href="file.html">
              <i class="fa fa-file"></i>
              <span class="link-title">
      File Manager
          </span>
            </a>
          </li>
          <li>
            <a href="typography.html">
              <i class="fa fa-font"></i>
              <span class="link-title">
            Typography
          </span>  </a>
          </li>
          <li>
            <a href="maps.html">
              <i class="fa fa-map-marker"></i><span class="link-title">
            Maps
          </span>
            </a>
          </li>
          <li>
            <a href="chart.html">
              <i class="fa fa fa-bar-chart-o"></i>
              <span class="link-title">
            Charts
          </span>
            </a>
          </li>
          <li>
            <a href="calendar.html">
              <i class="fa fa-calendar"></i>
              <span class="link-title">
            Calendar
          </span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-exclamation-triangle"></i>
              <span class="link-title">
              Error Pages
            </span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="403.html">
                  <i class="fa fa-angle-right"></i>&nbsp;403</a>
              </li>
              <li>
                <a href="404.html">
                  <i class="fa fa-angle-right"></i>&nbsp;404</a>
              </li>
              <li>
                <a href="405.html">
                  <i class="fa fa-angle-right"></i>&nbsp;405</a>
              </li>
              <li>
                <a href="500.html">
                  <i class="fa fa-angle-right"></i>&nbsp;500</a>
              </li>
              <li>
                <a href="503.html">
                  <i class="fa fa-angle-right"></i>&nbsp;503</a>
              </li>
              <li>
                <a href="offline.html">
                  <i class="fa fa-angle-right"></i>&nbsp;offline</a>
              </li>
              <li>
                <a href="countdown.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Under Construction</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="grid.html">
              <i class="fa fa-columns"></i>
              <span class="link-title">
    Grid
    </span>
            </a>
          </li>
          <li>
            <a href="blank.html">
              <i class="fa fa-square-o"></i>
              <span class="link-title">
    Blank Page
    </span>
            </a>
          </li>
          <li class="nav-divider"></li>
          <li>
            <a href="login.html">
              <i class="fa fa-sign-in"></i>
              <span class="link-title">
    Login Page
    </span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-code"></i>
              <span class="link-title">
      Unlimited Level Menu
      </span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a>
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li>
                    <a href="javascript:;">Level 2  <span class="fa arrow"></span>  </a>
                    <ul>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li>
                        <a href="javascript:;">Level 3  <span class="fa arrow"></span>  </a>
                        <ul>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li>
                            <a href="javascript:;">Level 4  <span class="fa arrow"></span>  </a>
                            <ul>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li> <a href="javascript:;">Level 4</a>  </li>
                    </ul>
                  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
              <li> <a href="javascript:;">Level 1</a>  </li>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a>
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul><!-- /#menu -->
      </div><!-- /#left -->
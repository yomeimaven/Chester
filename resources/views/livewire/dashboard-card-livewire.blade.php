                <div class="row mb-5" wire:poll.5s>
                  <div class="col-md-4 border">
                      <div class="card shadow text-warning" style="border-left: 5px solid orange">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="stat-content">
                                      <div class="stat-text font-weight-bold">Total Users</div>
                                      <div class="stat-digit h2">{{$TotalUser}}</div>
                                  </div>
                                  <div class="stat-icon">
                                      <i class="mdi mdi-account h1 text-warning"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer text-muted">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card shadow text-success" style="border-left: 5px solid green">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="stat-content">
                                      <div class="stat-text font-weight-bold">Total Devices</div>
                                      <div class="stat-digit h2">{{$TotalDevice}}</div>
                                  </div>
                                  <div class="stat-icon">
                                      <i class="mdi mdi-desktop-classic h1 text-success"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer text-muted">
                             
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card shadow text-info" style="border-left: 5px solid skyblue">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="stat-content">
                                      <div class="stat-text font-weight-bold">Total Sales</div>
                                      <div class="stat-digit h2">&#8369; {{$TotalSales}}</div>
                                  </div>
                                  <div class="stat-icon">
                                      <i class="mdi mdi-cash h1 text-info"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer text-muted">
                             
                          </div>
                      </div>
                  </div>
              </div>

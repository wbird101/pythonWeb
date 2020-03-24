<!--================================================search=============================================================-->
            <form method="post" action="">
                <div class="row">
                    <div class="col-8" align="left">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">이름</span>
                            </div>
                            <input type="text" class="form-control" placeholder="찾을 이름은?" aria-label="Username" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary">검색</button>
                            </div>
                        </div>
                    </div>
                    <!---------------------사용자 추가-------------------------------------->

                    <div class="col-4" align="right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">추가</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">사용자 추가</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" align="left">
                                <form>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send message</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
<!--===============================================사용자 목록==========================================================-->
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">번호</th>
                  <th scope="col">이름</th>
                  <th scope="col">아이디</th>
                  <th scope="col">암호</th>
                  <th scope="col">전화</th>
                  <th scope="col">등급</th>
                </tr>
              </thead>
              <tbody>
<?php
foreach($list as $row){
                echo '<tr ">';
                echo '  <th scope="row" ><a href="/sale/member/view/no/'.$row->no.'">'.$row->no.'</a></th>';
                echo '  <td>'.$row->name.'</td>';
                echo '  <td>'.$row->uid.'</td>';
                echo '  <td>'.$row->pwd.'</td>';
                echo '  <td>'.telview($row->tel).'</td>';
                echo '  <td>'.rankview($row->rank).'</td>';
                echo '</tr>';
}?>
              </tbody>
            </table>

            <!--===========================paging===========================================--->
            <div>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>

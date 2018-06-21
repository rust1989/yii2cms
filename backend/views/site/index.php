<?php
/* @var $this yii\web\View */
?>
<div class="row">
                        <div class="col-md-12">
                         <div class="panel">
                               <header class="panel-heading">系統配置</header>
                                <div class="panel-body table-responsive">
		                        <table class="table table-striped">
		                                        <tbody>
		                                        <tr>
		                                            <td>PHP Version:</td>
		                                            <td><?=GetPhpVersion()?></td>
		                                        </tr>
		                                        <tr>
		                                            <td>Max Upload:</td>
		                                            <td><?=GetServerFileUpload()?></td>
		                                        </tr>
		                                         <tr>
		                                            <td>Memory Use:</td>
		                                            <td><?=GetMemoryUsage()?></td>
		                                        </tr>
		                                        <tr>
		                                            <td>OS Version</td>
		                                            <td><?=PHP_OS?></td>
		                                        </tr>
		                                         <tr>
		                                            <td>Server Info:</td>
		                                            <td><?=GetServerSoftwares()?></td>
		                                        </tr>
		                                    </tbody>
		                          </table>
		                          <br/>
		                          <br/>
		                          <br/>
		                          <br/>
		                          </div>
		                   </div>
                        </div>
</div>               


		<!--page header / breadcrumbs-->
		<section class="breadcrumbs">
		    <div class="container" style='padding-bottom:0px;'>
				<div class="row">
		        	<div class="span12">
						<form class="bs-docs-example" style='margin:0px;' action="<?php echo site_url('user/journal_search')?>" method="get" />
							<input type="hidden" name="c" value="user" />
							<input type="hidden" name="m" value="journal_search" />
							<select name="type">
							    <option value="1">全文</option>
							    <option value="2">主题</option>
							    <option value="3">篇名</option>
							    <option value="4">作者</option>
							    <option value="5">单位</option>
							    <option value="6">关键词</option>
							    <option value="7">摘要</option>
							    <option value="8">参考文献</option>
							    <option value="9">中图分类号</option>
							    <option value="10">文献来源</option>
							</select>
							<input class="span4"  size="16" type="text" value="" name="search" />
							<input class="btn btn-welcome linebutton" type="submit" />
						</form>
					</div>
				</div>
		    </div>
		</section>
		<section id="breadcrumbs">
		    <div class="container">
		        <div class="page-header">
			        <div class="row">
				        <div class="span12">
							已选择：
					        <div class="linetext alert alert-block alert-error fade in" >
					            信息科技类<button type="button" class="close" data-dismiss="alert">&times;</button>
					        </div>
					        <div class="linetext alert alert-block alert-error fade in" >
					            农业类<button type="button" class="close" data-dismiss="alert">&times;</button>
					        </div>
						</div>
				    </div>
			    </div>
		    </div>
		</section>
		<!--container-->
		<section id="container">
		    <div class="container">
		        <div class="row">
		            <section id="page-sidebar" class="pull-left span9">
		            	<?php 
		            		if(isset($articles) && $articles)
		            		{
		            			// var_dump($articles);
		            			foreach ($articles as $row) 
		            			{
		            				
		            	?>
		            	<article class="blog-post">
		                    <div class="row">
		                        <div class="span3">
		                            <div class="post-media">
		                                <img src="example/01.jpg" alt="" />
		                            </div>
		                        </div>
		                        <div class="span5">
		                            <h3 class="post-title"><a href="<?php echo site_url('c=user&m=show_journal_detail&id=').$row->TitleID; ?>">期刊名：<?php echo $row->Title; ?></a></h3>
		                            <div class="post-content">
										<p>主办单位：<?php echo $row->Publisher; ?></p>
										<ul class="post-meta">
			                                <li>主题：<?php echo $row->Subject; ?></li>
			                                <li>分类：<?php echo $row->Classified; ?></li>
			                                <li>语言：<?php echo $row->LanguageEx; ?></li>
			                                <li><?php echo $row->Issn; ?></li>
			                                <li>国家：<?php echo $row->CountryEx; ?></li>
			                                <li><?php echo $row->OpenAccessRight; ?></li>
										</ul>
						                <div class="tags">
						                    <a href="#">优先</a>
						                </div>
		                            </div>
		                        </div>
		                    </div>
		                </article>
		                <hr />
		                <?php
		            			}
		            		}
		                ?>
		                <!--
		                <article class="blog-post">
		                    <div class="row">
		                        <div class="span3">
		                            <div class="post-media">
		                                <img src="example/01.jpg" alt="" />
		                            </div>
		                        </div>
		                        <div class="span5">
		                            <h3 class="post-title"><a href="./view.html">期刊名：农业现代化研究</a></h3>
		                            <div class="post-content">
										<p>主办单位：中国科学院农业研究委员会;中国科学院亚热带区域农业研究所</p>
										<ul class="post-meta">
			                                <li>综合影响因子：0.07</li>
			                                <li>复合影响因子：0.013</li>
			                                <li>被引频次：4800</li>
			                                <li>ISSN：1000-0275</li>
			                                <li>CN：43-1132/S</li>
										</ul>
						                <div class="tags">
						                    <a href="#">优先</a>
						                </div>
		                            </div>
		                        </div>
		                    </div>
		                </article>
		                <hr />
		                <article class="blog-post">
		                    <div class="row">
		                        <div class="span3">
		                            <div class="post-media">
		                                <img src="example/02.jpg" alt="" />
		                            </div>
		                        </div>
		                        <div class="span5">
		                            <h3 class="post-title"><a href="./view.html">期刊名：农业工程学报</a></h3>
		                            <div class="post-content">
		                                <p>主办单位：中国农业工程学会</p>
			                            <ul class="post-meta">
			                                <li>综合影响因子：0.07</li>
			                                <li>复合影响因子：0.013</li>
			                                <li>被引频次：4800</li>
			                                <li>ISSN：1002-6819</li>
			                                <li>CN：11-2047/S</li>
			                            </ul>
		                            </div>
		                        </div>
		                    </div>
		                </article>
		                <hr />
		                 <article class="blog-post">
		                    <div class="row">
		                        <div class="span3">
		                            <div class="post-media">
		                                <img src="example/03.jpg" alt="" />
		                            </div>
		                        </div>
		                        <div class="span5">
		                            <h3 class="post-title"><a href="./view.html">期刊名：农电管理</a></h3>
		                            <div class="post-content">
		                                <p>主办单位：中国电机工程学会</p>
			                            <ul class="post-meta">
			                                <li>综合影响因子：0.07</li>
			                                <li>复合影响因子：0.013</li>
			                                <li>被引频次：4800</li>
			                                <li>ISSN：1672-2450</li>
			                                <li>CN：11-3778/D</li>
			                            </ul>
		                            </div>
		                        </div>
		                    </div>
		                </article>
		                <hr />
		                <article class="blog-post">
		                    <div class="row">
		                        <div class="span3">
		                            <div class="post-media">
		                                <img src="example/04.jpg" alt="" />
		                            </div>
		                        </div>
		                        <div class="span5">
		                            <h3 class="post-title"><a href="./view.html">期刊名：可再生能源</a></h3>
		                            <div class="post-content">
		                                <p>主办单位：辽宁省能源研究所</p>
			                            <ul class="post-meta">
			                                <li>综合影响因子：0.07</li>
			                                <li>复合影响因子：0.013</li>
			                                <li>被引频次：4800</li>
			                                <li>ISSN：1671-5292</li>
			                                <li>CN：21-1469/TK</li>
			                            </ul>
						                <div class="tags">
						                    <a href="#">独家</a>
						                    <a href="#">优先</a>
						                </div>
		                            </div>
		                        </div>
		                    </div>
		                </article>
		                <hr />
		            -->
		                <!--pagination-->

		                <div class="pagination pagination-centered">
		                <?php echo $links; ?>
		                    <!--<ul>
		                        <li class="disabled"><a href="#">&laquo;</a></li>
		                        <li class="active"><a href="#">1</a></li>
		                        <li><a href="#">2</a></li>
		                        <li><a href="#">3</a></li>
		                        <li><a href="#">4</a></li>
		                        <li><a href="#">5</a></li>
		                        <li><a href="#">&raquo;</a></li>
		                    </ul> -->
		                </div>
		            </section>
		            <!--sidebar-->
		            <aside id="sidebar" class="pull-right span3">
			            <section>
			                <div class="accordion" id="accordion2">
			                    <div class="accordion-group">
			                        <div class="accordion-heading">
			                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
			                                <i class="icon-caret-right icon-white"></i>文献来源
			                            </a>
			                        </div>
			                        <div id="collapse1" class="accordion-body collapse in">
			                            <div class="accordion-inner">
			                                <ul class="icons ul-list">
			                                    <li><a href="#" ><div style='float:left;'>编辑学刊</div><div style='float:right;'>( 2 )</div></a></li>
			                                    <li><a href="#" ><div style='float:left;'>烽火科技报</div><div style='float:right;'>( 1 )</div></a></li>
			                                    <li><a href="#" ><div style='float:left;'>计算机应用与软件</div><div style='float:right;'>( 2 )</div></a></li>
			                                    <li><a href="#" ><div style='float:left;'>微处理机</div><div style='float:right;'>( 1 )</div></a></li>
			                                    <li><a href="#" ><div style='float:left;'>现代电信科技</div><div style='float:right;'>( 20 )</div></a></li>
			                               </ul>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </section>
		            </aside>
		        </div>
		    </div>
		</section>
	</div>

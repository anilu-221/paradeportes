<?php
/**
 * Template para Archivo de Paradeportistas
 *
 * @package paradeportes
 */

get_header();

// Variables.


?>

<div class="container">
	<div class="row">
		<div class="col-12 my-5">
			<div class="container">
				<div class="row">
					<!--Filtros--> 
					<div class="col-12 mb-4">
						<form id="paradeportistas-formulario" action="/paradeportistas" class="d-flex catalogo__form">
							<!--Pais--> 
							<div class="d-flex flex-column">
								<label class="h4 me-2" for="pais">País</label>
								<select name="pais" id="pais">
									<?php
									$paises       = get_terms( array( 'taxonomy' => 'pais', 'hide_empty' => false ) );
									$current_pais = '';
									if ( $paises ) {
										if ( isset( $_GET['pais'] ) ) {
												$current_pais = $_GET['pais'];
										} else {
											$current_pais = 'Todos';
										}

										?>
										<option  value="todos">Todos</option>
										<?php

										foreach ( $paises as $pais ) {
											$name = $pais->name;
											$slug = $pais->slug;
											?>
											<option <?php if ($current_pais == $pais->slug) echo 'selected'; ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
											<?php
										}
									}
									?>
								</select>
							</div>
							<!--Paradeporte--> 
							<div class="d-flex flex-column">
								<label class="h4 me-2" for="paradeporte">Paradeporte</label>
								<select name="paradeporte" id="paradeporte">
									<?php
									$paradeportes = get_terms( array( 'taxonomy' => 'paradeporte', 'hide_empty' => false ) );
									$current_paradeporte = '';
									if ( $paradeportes ) {
										if ( isset( $_GET['paradeporte'] ) ) {
												$current_paradeporte = $_GET['paradeporte'];
										} else {
											$current_paradeporte = $paradeportes[0];
										}
										?>
										<option  value="todos">Todos</option>
										<?php
										foreach ( $paradeportes as $paradeporte ) {
											$name = $paradeporte->name;
											$slug = $paradeporte->slug;
											?>
											<option <?php if ($current_paradeporte == $paradeporte->slug) echo 'selected'; ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
											<?php
										}
									}
									?>
								</select>
							</div>

							<!--Nivel--> 
							<div class="d-flex flex-column">
								<label class="h4 me-2" for="nivel">Nivel</label>
								<select name="nivel" id="nivel">
									<?php
									$niveles = get_terms( array( 'taxonomy' => 'nivel', 'hide_empty' => false ) );
									$current_nivel = '';
									if ( $niveles ) {
										if ( isset( $_GET['nivel'] ) ) {
												$current_nivel = $_GET['nivel'];
										} else {
											$current_nivel = $niveles[0];
										}
										?>
										<option  value="todos">Todos</option>
										<?php
										foreach ( $niveles as $nivel ) {
											$name = $nivel->name;
											$slug = $nivel->slug;
											?>
											<option <?php if ($current_nivel == $nivel->slug) echo 'selected'; ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
											<?php
										}
									}
									?>
								</select>
							</div>

							<!--Categoria--> 
							<div class="d-flex flex-column">
								<label class="h4 me-2" for="categoria">Categoria</label>
								<select name="categoria_paradeportista" id="categoria">
									<?php
									$categorias = get_terms( array( 'taxonomy' => 'categoria_paradeportista', 'hide_empty' => false ) );
									$current_categoria = '';
									if ( $categorias ) {
										if ( isset( $_GET['categoria_paradeportista'] ) ) {
												$current_categoria = $_GET['categoria_paradeportista'];
										} else {
											$current_categoria = $categorias[0];
										}
										?>
										<option  value="todas">Todas</option>
										<?php
										foreach ( $categorias as $categoria ) {
											$name = $categoria->name;
											$slug = $categoria->slug;
											?>
											<option <?php if ($current_categoria == $categoria->slug) echo 'selected'; ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
											<?php
										}
									}
									?>
								</select>
							</div>

							<!--Discapacidad--> 
							<div class="d-flex flex-column">
								<label class="h4 me-2" for="discapacidad">Discapacidad</label>
								<select name="discapacidad" id="discapacidad">
									<?php
									$discapacidades = get_terms( array( 'taxonomy' => 'discapacidad', 'hide_empty' => false ) );
									$current_discapacidad = '';
									if ( $discapacidades ) {
										if ( isset( $_GET['discapacidad'] ) ) {
												$current_discapacidad = $_GET['discapacidad'];
										} else {
											$current_discapacidad = $discapacidades[0];
										}
										?>
										<option  value="todas">Todas</option>
										<?php
										foreach ( $discapacidades as $discapacidad ) {
											$name = $discapacidad->name;
											$slug = $discapacidad->slug;
											?>
											<option <?php if ($current_discapacidad == $discapacidad->slug) echo 'selected'; ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
											<?php
										}
									}
									?>
								</select>
							</div>
						</form>
					</div>

					<!--Query--> 
						<?php
						$current_page = '';
						$pais         = 'todos';
						$paradeporte  = 'todos';
						$nivel        = 'todos';
						$categoria    = 'todas';
						$discapacidad = 'todas';

						if ( isset( $_GET['current_page'] ) ) {
							$current_page = $_GET['current_page'];
						}

						if ( isset( $_GET['pais'] ) ) {
							$pais = $_GET['pais'];
						}

						if ( isset( $_GET['paradeporte'] ) ) {
							$paradeporte = $_GET['paradeporte'];
						}

						if ( isset( $_GET['nivel'] ) ) {
							$nivel = $_GET['nivel'];
						}

						if ( isset( $_GET['categoria_paradeportista'] ) ) {
							$categoria = $_GET['categoria_paradeportista'];
						}

						if ( isset( $_GET['discapacidad'] ) ) {
							$discapacidad = $_GET['discapacidad'];
						}

						$pais_array = '';
						if ( 'todos' !== $pais ) {
							$pais_array = array(
								'taxonomy' => 'pais',
								'field'    => 'slug',
								'terms'    => $pais,
								'operator' => 'IN',
							);
						}

						$paradeporte_array = '';
						if ( 'todos' !== $paradeporte ) {
							$paradeporte_array = array(
								'taxonomy' => 'paradeporte',
								'field'    => 'slug',
								'terms'    => $paradeporte,
								'operator' => 'IN',
							);
						}

						$nivel_array = '';
						if ( 'todos' !== $nivel ) {
							$nivel_array = array(
								'taxonomy' => 'nivel',
								'field'    => 'slug',
								'terms'    => $nivel,
								'operator' => 'IN',
							);
						}

						$categoria_array = '';
						if ( 'todas' !== $categoria ) {
							$categoria_array = array(
								'taxonomy' => 'categoria_paradeportista',
								'field'    => 'slug',
								'terms'    => $categoria,
								'operator' => 'IN',
							);
						}

						$discapacidad_array = '';
						if ( 'todas' !== $discapacidad ) {
							$discapacidad_array = array(
								'taxonomy' => 'discapacidad',
								'field'    => 'slug',
								'terms'    => $discapacidad,
								'operator' => 'IN',
							);
						}

						// Query Array.
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$paradeportistas_args = array(
							'post_type'      => 'paradeportista',
							'posts_per_page' => 20,
							'paged'          => $paged,
							'tax_query'      => array(
								'relation' => 'AND',
								$pais_array,
								$paradeporte_array,
								$nivel_array,
								$categoria_array,
								$discapacidad_array,
							),

						);
						$paradeportistas_query = new WP_Query( $paradeportistas_args );
						?>
					<!--Desktop--> 
					<div class="d-none d-lg-block p-0 rounded shadow" style="overflow:clip">
						<?php 
							$paradeportistas_count = $paradeportistas_query->found_posts;
							?>
							<!--Table--> 
								<table class="table catalogo__table bg-white">
									<thead class="bg-primary text-white">
										<tr class="text-center">
											<th scope="col"></th>
											<th scope="col">Paradeportista</th>
											<th scope="col">Pais</th>
											<th scope="col">Paradeporte</th>
											<th scope="col">Nivel</th>
											<th scope="col">Categoría</th>
											<th scope="col">Discapacidad</th>
										</tr>
									</thead>
									<tbody class="prospects__table-body">
										<?php
										$queried = false;
										if ( $paradeportistas_query->have_posts() ){
											$queried = true;
											while ( $paradeportistas_query->have_posts() ) {
												$paradeportistas_query->the_post();
												$paises                   = get_the_terms( get_the_ID(), 'pais' );
												$nivel                    = get_the_terms( get_the_ID(), 'nivel' );
												$discapacidad             = get_the_terms( get_the_ID(), 'discapacidad' );
												$paradeportes             = get_the_terms( get_the_ID(), 'paradeporte' );
												$categoria_paradeportista = get_the_terms( get_the_ID(), 'categoria_paradeportista' );
												?>
												<tr class="text-center">
													<!--Image--> 
													<td class="align-middle">
														<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="text-decoration-none">
															<?php
															if ( has_post_thumbnail() ) {
																echo get_the_post_thumbnail(
																	get_the_ID(),
																	'large',
																	array(
																		'class' => 'catalogo__img',
																	)
																);
															} else {
																?>
																<img class="catalogo__img" src="<?php echo esc_url( PLUGIN_URL . '/src/images/paradeportes-user.jpg' ); ?>" alt="Sombra de una persona">
																<?php
															}
															?>
														</a>
													</td>

													<!--Paradeportista-->
													<td>
														<a class="text-decoration-none" href="<?php echo get_the_permalink(); ?>">
															<?php echo get_the_title(); ?>
														</a>
													</td>

													<!--Pais-->
													<td>
														<?php
															if ( $paises ) {
																foreach ( $paises as $pais ) {
																	$name    = $pais->name;
																	$bandera = get_field( 'bandera', 'pais_' . $pais->term_id );
																	if ( $bandera ) {
																		echo wp_get_attachment_image(
																			$bandera,
																			'medium',
																			true,
																			array(
																				'class' => 'catalogo__bandera',
																			)
																		);
																	}
																}
															}
														?>
													</td>
													<!--Paradeporte-->
													<td>
														<?php
															if ( $paradeportes ) {
																foreach ( $paradeportes as $paradeporte ) {
																	$name           = $paradeporte->name;
																	$paradeporte_id = $paradeporte->term_id;
																	?>
																	<?php echo esc_html( $name ); ?>
																	<?php
																}
															}
														?>
													</td>
													<!--Nivel-->
													<td>
														<?php
															if ( $nivel ) {
																$count = 1;
																$total = count( $nivel );
																foreach ( $nivel as $niv ) {
																	echo esc_html( $niv->name );
																	if ( $count < $total ) {
																		echo ', ';
																	}
																	$count++;
																}
															}
														?>
													</td>
													<!--Categoria-->
													<td>
														<?php
															if ( $categoria_paradeportista ) {
																$count = 1;
																$total = count( $categoria_paradeportista );
																foreach ( $categoria_paradeportista as $cat_p ) {
																	echo esc_html( $cat_p->name );
																	if ( $count < $total ) {
																		echo ', ';
																	}
																	$count++;
																}
															}
														?>
													</td>
													<!--Discapacidad-->
													<td>
														<?php
															if ( $discapacidad ) {
																$count = 1;
																$total = count( $discapacidad );
																foreach ( $discapacidad as $disc ) {
																	echo esc_html( $disc->name );
																	if ( $count < $total ) {
																		echo ', ';
																	}
																	$count++;
																}
															}
														?>
													</td>
												</tr>
												<?php
											}
										}
										?>
									</tbody>
								</table>
							<?php
							if ( $queried ) {
								paradeportes_custom_number_pagination( $paradeportistas_query );
								$paradeportistas_found = ' Paradeportistas';
								if($paradeportistas_count == 1){
									$paradeportistas_found = ' Paradeportista';
								}
								echo '<div class="h4 text-primary d-flex justify-content-center"><p>'.$paradeportistas_count.$paradeportistas_found.'</p></div>';
								wp_reset_postdata();
							}else{
								echo '<p class="h3 text-center py-4">Ningún Paradeportista encontrado.</p>';
							}
						?>
					</div>

					<!--Mobile-->
					<div class="d-lg-none">
						<?php 
							$paradeportistas_count = $paradeportistas_query->found_posts;
							$queried = false;
							if ( $paradeportistas_query->have_posts() ){
								$queried = true;
								while ( $paradeportistas_query->have_posts() ) {
									$paradeportistas_query->the_post();
									$paises                   = get_the_terms( get_the_ID(), 'pais' );
									$nivel                    = get_the_terms( get_the_ID(), 'nivel' );
									$discapacidad             = get_the_terms( get_the_ID(), 'discapacidad' );
									$paradeportes             = get_the_terms( get_the_ID(), 'paradeporte' );
									$categoria_paradeportista = get_the_terms( get_the_ID(), 'categoria_paradeportista' );
									?>
									<div class="row p-0 rounded shadow bg-white my-3">
										<div class="col-12 p-0">
											<!--Image--> 
											<?php
												if ( has_post_thumbnail() ) {
													?>
													<a href="<?php echo get_the_permalink(); ?>">
													<?php
													echo get_the_post_thumbnail(
														get_the_ID(),
														'large',
														array(
															'class' => 'catalogo__img',
														)
													);
													?>
													</a>
													<?php
												} else {
													?>
													<a href="<?php echo get_the_permalink(); ?>">
														<img class="catalogo__img" src="<?php echo esc_url( PLUGIN_URL . '/src/images/paradeportes-user.jpg' ); ?>" alt="Sombra de una persona">
													</a>
													<?php
												}
											?>
										</div>
										<div class="col-12 p-4">
											<div class="d-flex flex-wrap align-items-center">
												<!--Flag-->
												<?php
													if ( $paises ) {
														foreach ( $paises as $pais ) {
															$name    = $pais->name;
															$bandera = get_field( 'bandera', 'pais_' . $pais->term_id );
															if ( $bandera ) {
																echo wp_get_attachment_image(
																	$bandera,
																	'medium',
																	true,
																	array(
																		'class' => 'catalogo__bandera',
																	)
																);
															}
														}
													}
												?>

												<!--Name--> 
												<a class="text-decoration-none text-dark" href="<?php echo get_the_permalink(); ?>">
													<p class="h2 m-0"><?php the_title(); ?></p>
												</a>
											</div>

											<!--Paradeporte--> 
											<?php
												if ( $paradeportes ) {
													foreach ( $paradeportes as $paradeporte ) {
														$name           = $paradeporte->name;
														$paradeporte_id = $paradeporte->term_id;
														$logo           = get_field( 'logo_de_paradeporte', 'paradeporte_' . $paradeporte->term_id );
														if ( $logo ) {
															?>
															<div class="d-flex align-items-center mt-3">
																<?php 
																echo wp_get_attachment_image(
																	$logo,
																	'Medium',
																	false,
																	array(
																		'class' => 'paradeportista__deporte-logo bg-primary',
																	)
																);
																?>
																<p class="text-primary h3 m-0"><?php echo esc_html( $name ); ?></p>
															</div>
															<?php
														} else {
															?>
															<p class="text-primary h3 m-0"><?php echo esc_html( $name ); ?></p>
															<?php
														}
													}
												}
											?>
											<!--Nivel-->
											<?php
											if ( $nivel ) {
												$count = 1;
												$total = count( $nivel );
												echo '<p class="mt-3">';
												echo 'Nivel: ';
												foreach ( $nivel as $niv ) {
													echo esc_html( $niv->name );
													if ( $count < $total ) {
														echo ', ';
													}
													$count++;
												}
												echo '</p>';
											}
											?>
											<!--Categoría-->
											<?php
												if ( $categoria_paradeportista ) {
													$count = 1;
													$total = count( $categoria_paradeportista );
													echo '<p class="mt-3">';
													echo 'Categoría: ';
													foreach ( $categoria_paradeportista as $cat_p ) {
														echo esc_html( $cat_p->name );
														if ( $count < $total ) {
															echo ', ';
														}
														$count++;
													}
													echo '</p>';
												}
											?>
											<!--Discapacidad-->
											<?php
												if ( $discapacidad ) {
													$count = 1;
													$total = count( $discapacidad );
													echo '<p class="mt-3">';
													echo 'Tipo de discapacidad: ';
													foreach ( $discapacidad as $disc ) {
														echo esc_html( $disc->name );
														if ( $count < $total ) {
															echo ', ';
														}
														$count++;
													}
													echo '</p>';
												}
											?>
										</div>
									</div>
									<?php
								}
							}
							if ( $queried ) {
								paradeportes_custom_number_pagination( $paradeportistas_query );
								$paradeportistas_found = ' Paradeportistas';
								if($paradeportistas_count == 1){
									$paradeportistas_found = ' Paradeportista';
								}
								echo '<div class="h4 text-primary d-flex justify-content-center"><p>'.$paradeportistas_count.$paradeportistas_found.'</p></div>';
								wp_reset_postdata();
							}else{
								echo '<p class="h3 text-center py-4">Ningún Paradeportista encontrado.</p>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();

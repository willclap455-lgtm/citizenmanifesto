
</main>
<footer class="site-footer">
	<div class="site-footer__inner">
		<section>
			<p class="footer-title"><?php bloginfo( 'name' ); ?></p>
			<p>Truth reporting for citizens documenting state power.</p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Coverage', 'citizen-manifesto-noir' ); ?></h2>
			<p><?php esc_html_e( 'Police corruption, malpractice, misconduct cases, public records, and documented incidents.', 'citizen-manifesto-noir' ); ?></p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Navigation', 'citizen-manifesto-noir' ); ?></h2>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</section>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

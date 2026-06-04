
</main>
<footer class="site-footer">
	<div class="site-footer__inner">
		<section>
			<p class="footer-title"><?php bloginfo( 'name' ); ?></p>
			<p>Fast dispatches for people tracking abuse of power.</p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Coverage', 'citizen-manifesto-signal' ); ?></h2>
			<p><?php esc_html_e( 'Police corruption, malpractice, misconduct cases, public records, and documented incidents.', 'citizen-manifesto-signal' ); ?></p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Navigation', 'citizen-manifesto-signal' ); ?></h2>
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

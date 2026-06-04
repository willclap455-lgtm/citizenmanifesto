
</main>
<footer class="site-footer">
	<div class="site-footer__inner">
		<section>
			<p class="footer-title"><?php bloginfo( 'name' ); ?></p>
			<p>Independent reporting in the public interest.</p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Coverage', 'citizen-manifesto-public-record' ); ?></h2>
			<p><?php esc_html_e( 'Police corruption, malpractice, misconduct cases, public records, and documented incidents.', 'citizen-manifesto-public-record' ); ?></p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Navigation', 'citizen-manifesto-public-record' ); ?></h2>
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

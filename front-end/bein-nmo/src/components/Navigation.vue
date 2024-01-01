<template>	<div class="container">
		<div class="navigation">
			<ul>
				<li>
					<router-link to="/">
						<a href="/">
							<p class="header__logo">
								<img
									src="./../assets/icons/logo.svg"
									alt=""
								/>
							</p>
							<h2 class="logo-text">BeInMedia</h2>
						</a>
					</router-link>
				</li>
				<li>
					<router-link to="/">
						<a href="#">
							<span class="icon">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="ionicon"
									viewBox="0 0 512 512"
								>
									<path
										d="M80 212v236a16 16 0 0016 16h96V328a24 24 0 0124-24h80a24 24 0 0124 24v136h96a16 16 0 0016-16V212"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-linejoin="round"
										stroke-width="32"
									/>
									<path
										d="M480 256L266.89 52c-5-5.28-16.69-5.34-21.78 0L32 256M400 179V64h-48v69"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-linejoin="round"
										stroke-width="32"
									/>
								</svg>
							</span>
							<span class="title">Home</span>
						</a>
					</router-link>
				</li>
				<li>
					<router-link to="/categories">
						<a href="#">
							<span class="icon">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="ionicon"
									viewBox="0 0 512 512"
								>
									<rect
										x="128"
										y="128"
										width="336"
										height="336"
										rx="57"
										ry="57"
										fill="none"
										stroke="currentColor"
										stroke-linejoin="round"
										stroke-width="32"
									/>
									<path
										d="M383.5 128l.5-24a56.16 56.16 0 00-56-56H112a64.19 64.19 0 00-64 64v216a56.16 56.16 0 0056 56h24"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-linejoin="round"
										stroke-width="32"
									/>
								</svg>
							</span>
							<span class="title">Categories</span>
						</a>
					</router-link>
				</li>
				<li>
					<router-link to="/items">
						<a href="#">
							<span class="icon">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="ionicon"
									viewBox="0 0 512 512"
								>
									<path
										d="M322 416c0 35.35-20.65 64-56 64H134c-35.35 0-56-28.65-56-64M336 336c17.67 0 32 17.91 32 40h0c0 22.09-14.33 40-32 40H64c-17.67 0-32-17.91-32-40h0c0-22.09 14.33-40 32-40"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-miterlimit="10"
										stroke-width="32"
									/>
									<path
										d="M344 336H179.31a8 8 0 00-5.65 2.34l-26.83 26.83a4 4 0 01-5.66 0l-26.83-26.83a8 8 0 00-5.65-2.34H56a24 24 0 01-24-24h0a24 24 0 0124-24h288a24 24 0 0124 24h0a24 24 0 01-24 24zM64 276v-.22c0-55 45-83.78 100-83.78h72c55 0 100 29 100 84v-.22M241 112l7.44 63.97"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-miterlimit="10"
										stroke-width="32"
									/>
									<path
										d="M256 480h139.31a32 32 0 0031.91-29.61L463 112"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-miterlimit="10"
										stroke-width="32"
									/>
									<path
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-linejoin="round"
										stroke-width="32"
										d="M368 112l16-64 47-16"
									/>
									<path
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-miterlimit="10"
										stroke-width="32"
										d="M224 112h256"
									/>
								</svg>
							</span>
							<span class="title">Items</span>
						</a>
					</router-link>
				</li>
				<li>
					<router-link to="/items/apply-discount">
						<a href="#">
							<span class="icon">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="ionicon"
									viewBox="0 0 512 512"
								>
									<path
										d="M435.25 48h-122.9a14.46 14.46 0 00-10.2 4.2L56.45 297.9a28.85 28.85 0 000 40.7l117 117a28.85 28.85 0 0040.7 0L459.75 210a14.46 14.46 0 004.2-10.2v-123a28.66 28.66 0 00-28.7-28.8z"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-linejoin="round"
										stroke-width="32"
									/>
									<path
										d="M384 160a32 32 0 1132-32 32 32 0 01-32 32z"
									/>
								</svg>
							</span>
							<span class="title">Discounts</span>
						</a>
					</router-link>
				</li>
				<li>
					<router-link to="/">
						<a
							title="logout"
							href="#"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
						>
							<span class="icon">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="ionicon"
									viewBox="0 0 512 512"
								>
									<path
										d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256"
										fill="none"
										stroke="currentColor"
										stroke-linecap="round"
										stroke-linejoin="round"
										stroke-width="32"
									/>
								</svg>
							</span>
							<span class="title">Logout</span>
						</a>
					</router-link>
					<form
						id="logout-form"
						action="#"
						method="post"
					>
						<!-- @csrf -->
					</form>
				</li>
			</ul>
		</div>
	</div>
</template>
<script>
export default {
	name: "Navigation",
};
</script>

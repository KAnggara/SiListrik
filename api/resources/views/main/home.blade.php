@extends('layout.main')
@section('container')
	<section>
		<div class="main-content mt-12 flex-1 bg-gray-100 pb-24 md:mt-2 md:pb-5" id="main">
			<div class="bg-gray-800 pt-3">
				<div class="rounded-t-3xl bg-gradient-to-r from-blue-400 to-blue-900 p-4 text-2xl text-white shadow">
					<h1 class="pl-2 font-bold">Analytics</h1>
				</div>
			</div>
			<div class="flex flex-wrap">

				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					<div class="rounded-lg border-b-4 border-blue-500 bg-gradient-to-b from-blue-200 to-blue-100 p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="rounded-full bg-blue-600 p-5">

									<i class="fas fa-plug fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Saklar</h2>
								<p class="text-3xl font-bold">
									{{ $relay->status == 1 ? 'ON' : 'OFF' }}
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					<div class="rounded-lg border-b-4 border-blue-500 bg-gradient-to-b from-blue-200 to-blue-100 p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="rounded-full bg-blue-600 p-5">
									<i class="fas fa-bolt fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Voltase</h2>
								<p class="text-3xl font-bold">
									{{ $last->voltase }} Volt
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					<div class="rounded-lg border-b-4 border-blue-500 bg-gradient-to-b from-blue-200 to-blue-100 p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="rounded-full bg-blue-600 p-5">
									<i class="fas fa-lightbulb fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Arus</h2>
								<p class="text-3xl font-bold">
									{{ $last->arus }} A
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					@php
						$V = $last->voltase;
						$I = $last->arus;
						$P = $V * $I;
					@endphp
					<div
						class="{{ $P > $setting->limit ? 'border-red-500 from-red-200 to-red-100' : 'border-blee-500 from-blue-200 to-blue-100' }} rounded-lg border-b-4 bg-gradient-to-b p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="{{ $P > $setting->limit ? 'bg-red-600' : 'bg-blue-600' }} rounded-full p-5">
									<i class="fas fa-lightbulb fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Daya</h2>
								<p class="text-2xl font-bold">
									{{ number_format($P, '1', '.', ',') . ' VA' }}
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					<div
						class="{{ $last->temperatur > $setting->tmax ? 'border-red-500 from-red-200 to-red-100' : 'border-green-500 from-green-200 to-green-100' }} rounded-lg border-b-4 bg-gradient-to-b p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="{{ $last->temperatur > $setting->tmax ? 'bg-red-600' : 'bg-green-600' }} rounded-full p-5">
									<i
										class="fas {{ $last->temperatur > $setting->tmax ? 'fa-thermometer-full' : 'fa-thermometer-empty' }} fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Temperatur</h2>
								<p class="text-2xl font-bold">
									<span class="font-normal italic"> {{ number_format($last->temperatur) }} C&deg; </span> |
									{{ $last->temperatur > $setting->tmax ? 'Suhu Tinggi' : 'Suhu Normal' }}
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					<div
						class="{{ $last->asap > $setting->asap ? 'border-red-500 from-red-200 to-red-100' : 'border-green-500 from-green-200 to-green-100' }} rounded-lg border-b-4 bg-gradient-to-b p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="{{ $last->asap > $setting->asap ? 'bg-red-600' : 'bg-green-600' }} rounded-full p-5">
									<i class="fas fa-smoking fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Asap</h2>
								<p class="text-2xl font-bold">
									{{ $last->asap > $setting->asap ? 'Asap Terdeteksi' : 'Tidak Terdeteksi' }}
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="w-full p-6 md:w-1/2 xl:w-1/3">
					<div
						class="{{ $last->api > 0 ? 'border-red-500 from-red-200 to-red-100' : 'border-green-500 from-green-200 to-green-100' }} rounded-lg border-b-4 bg-gradient-to-b p-5 shadow-xl">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="{{ $last->api > 0 ? 'bg-red-600' : 'bg-green-600' }} rounded-full p-5">
									<i class="fas fa-fire-extinguisher fa-2x fa-inverse"></i>
								</div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Api</h2>
								<p class="text-3xl font-bold">
									{{ $last->api > 0 ? 'Api Terdeteksi' : 'Tidak Terdeteksi' }}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			{{-- Log chart --}}
			<div class="mt-2 flex flex-grow flex-row flex-wrap">
				<div class="w-full p-6 md:w-1/2 xl:w-1/2">
					<!--Graph Card-->
					<div class="rounded-lg border-transparent bg-white shadow-xl">
						<div
							class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-blue-300 to-blue-100 p-2 uppercase text-gray-800">
							<h class="font-bold uppercase text-gray-600">Histori Daya (VA)</h>
						</div>
						<div class="p-2 md:p-5">

							<canvas class="chartjs" id="chartjs-daya"></canvas>
							<script>
								const ctxA = document.getElementById("chartjs-daya");
								let dateA = {!! json_encode($date, JSON_HEX_TAG) !!};
								let daya = {!! json_encode($daya, JSON_HEX_TAG) !!};
								new Chart(ctxA, {
									type: "line",
									data: {
										labels: dateA,
										datasets: [{
											label: "Daya (VA)",
											data: daya.reverse(),
											borderColor: "rgba(255, 0, 132, 1)",
											reverse: true,
											fill: true
										}]
									},
									options: {
										rotation: (0.5 * Math.PI),
										legend: {
											display: false,
										},
									}
								});
							</script>
						</div>
					</div>
				</div>

				<div class="w-full p-6 md:w-1/2 xl:w-1/2">
					<div class="rounded-lg border-transparent bg-white shadow-xl">
						<div
							class="rounded-tl-lg rounded-tr-lg border-b-2 border-gray-300 bg-gradient-to-b from-blue-300 to-blue-100 p-2 uppercase text-gray-800">
							<h2 class="font-bold uppercase text-gray-600">Histori Suhu (C&deg;)</h2>
						</div>
						<div class="p-2 md:p-5">
							<canvas class="chartjs" id="chart-suhu"></canvas>
							<script>
								const ctxB = document.getElementById("chart-suhu");
								let suhu = {!! json_encode($suhu, JSON_HEX_TAG) !!};
								let date = {!! json_encode($date, JSON_HEX_TAG) !!};
								new Chart(ctxB, {
									type: "line",
									data: {
										labels: date,
										datasets: [{
											data: suhu.reverse(),
											label: "Suhu (C)",
											lineTension: 0.5,
											borderColor: "rgb(75, 192, 50)",
										}]
									},
									options: {
										legend: {
											display: false,
										},
									}
								});
							</script>
						</div>
					</div>
				</div>
			</div>
	</section>
@endsection

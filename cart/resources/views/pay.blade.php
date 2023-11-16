@extends('layouts.frontend')


@section('content')
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif
                    <h3 class="text-3xl text-bold">PAGAMENTO</h3>
                    <div class="flex-1">


                        @auth
                            <div>
                                Totale da pagare: €{{ Cart::getTotal() }}
                                <form method="get" action="{{ route('make.payment') }}">
                                    <input type="hidden" name="importo" value="{{ Cart::getTotal() }}">
                                    <input type="submit" value="PAGA">
                                </form>

                            </div>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="px-4 py-2 text-white bg-blue-800 rounded">Loggati per
                                completare il pagamento</a>
                        @endguest


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

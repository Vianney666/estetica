@extends('/inicio/app')

@section('titulo', 'mostrar transacciones')

@section('contenido')

 <div class="flex flex-col">
 <div class=" overflow-x-auto">
     <div class="min-w-full inline-block align-middle">
         <div class="overflow-hidden border rounded-lg border-gray-300">
             <table class=" min-w-full rounded-xl">
                 <thead>
                     <tr class="bg-gray-50">
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> ID </th>
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Cita ID </th>
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Monto </th>
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Método de pago </th>
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Estado </th>
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Fecha de pago </th>
                         <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Referencia </th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr class="odd:bg-white even:bg-gray-50">
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Louis Vuitton</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 20010510 </td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Customer</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Accessories</td>
                     </tr>
                     <tr class="odd:bg-white even:bg-gray-50">
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Apple</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 20010511 </td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Partner</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Electronics</td>
                     </tr>
                     <tr class="odd:bg-white even:bg-gray-50">
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Johnson</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 20010512 </td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Customer</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Telecommunications</td>
                     </tr>
                     <tr class="odd:bg-white even:bg-gray-50">
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Starbucks</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> 20010513 </td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Reseller</td>
                         <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> Retail</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
</div>

@endsection
<div>
    {{-- success message --}}
    @if(session()->has('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-xl font-semibold mb-4">Add AICS Member</h1>

    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

            <div>
                <label class="block text-sm">First name</label>
                <input type="text" wire:model.defer="first_name" class="w-full input text-sm" required>
                @error('first_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm">Middle name</label>
                <input type="text" wire:model.defer="middle_name" class="w-full input text-sm">
                @error('middle_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm">Last name</label>
                <input type="text" wire:model.defer="last_name" class="w-full input text-sm" required>
                @error('last_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm">Suffix</label>
                <input type="text" wire:model.defer="suffix" class="w-full input text-sm">
                @error('suffix') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
    <label class="block text-sm">Barangay</label>
    <select wire:model.defer="barangay" class="w-full input text-sm" required>
        <option value="">Select barangay</option>
        <option value="Ada">Ada</option>
        <option value="Amanluran">Amanluran</option>
        <option value="Arado">Arado</option>
        <option value="Atipolo">Atipolo</option>
        <option value="Balud">Balud</option>
        <option value="Bangon">Bangon</option>
        <option value="Bantagan">Bantagan</option>
        <option value="Baras">Baras</option>
        <option value="Binolo">Binolo</option>
        <option value="Binongto-an">Binongto-an</option>
        <option value="Bislig">Bislig</option>
        <option value="Buntay (Poblacion)">Buntay (Poblacion)</option>
        <option value="Cabalagnan">Cabalagnan</option>
        <option value="Cabarasan Guti">Cabarasan Guti</option>
        <option value="Cabonga-an">Cabonga-an</option>
        <option value="Cabuynan">Cabuynan</option>
        <option value="Cahumayhumayan">Cahumayhumayan</option>
        <option value="Calogcog">Calogcog</option>
        <option value="Calsadahay">Calsadahay</option>
        <option value="Camire">Camire</option>
        <option value="Canbalisara">Canbalisara</option>
        <option value="Canramos (Poblacion)">Canramos (Poblacion)</option>
        <option value="Catigbian">Catigbian</option>
        <option value="Catmon">Catmon</option>
        <option value="Cogon">Cogon</option>
        <option value="Guindag-an">Guindag-an</option>
        <option value="Guingawan">Guingawan</option>
        <option value="Hilagpad">Hilagpad</option>
        <option value="Kiling">Kiling</option>
        <option value="Lapay">Lapay</option>
        <option value="Licod (Poblacion)">Licod (Poblacion)</option>
        <option value="Limbuhan Daku">Limbuhan Daku</option>
        <option value="Limbuhan Guti">Limbuhan Guti</option>
        <option value="Linao">Linao</option>
        <option value="Magay">Magay</option>
        <option value="Maghulod">Maghulod</option>
        <option value="Malaguicay">Malaguicay</option>
        <option value="Maribi">Maribi</option>
        <option value="Mohon">Mohon</option>
        <option value="Pago">Pago</option>
        <option value="Pasil">Pasil</option>
        <option value="Pikas">Pikas</option>
        <option value="Sacme">Sacme</option>
        <option value="San Miguel (Poblacion)">San Miguel (Poblacion)</option>
        <option value="Salvador">Salvador</option>
        <option value="San Isidro">San Isidro</option>
        <option value="San Roque (Poblacion)">San Roque (Poblacion)</option>
        <option value="San Victor">San Victor</option>
        <option value="Santa Cruz">Santa Cruz</option>
        <option value="Santa Elena">Santa Elena</option>
        <option value="Santo Niño (Haclagan) (Poblacion)">Santo Niño (Haclagan) (Poblacion)</option>
        <option value="Solano">Solano</option>
        <option value="Talolora">Talolora</option>
        <option value="Tugop">Tugop</option>
    </select>
    @error('barangay') 
        <span class="text-red-600 text-xs">{{ $message }}</span> 
    @enderror
</div>


            <div>
                <label class="block text-sm">Department Function Code</label>
                <input type="number" wire:model.defer="department_function_code" class="w-full input text-sm" required>
                @error('department_function_code') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm">Amount</label>
                <input type="number" step="0.01" wire:model.defer="amount" class="w-full input text-sm">
                @error('amount') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm">Purpose</label>
                <select wire:model.defer="purpose" class="w-full input text-sm" required>
                    <option value="">Select purpose</option>
                    <option>Medical</option>
                    <option>Financial</option>
                    <option>Burial</option>
                    <option>None</option>
                </select>
                @error('purpose') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm">Assistance Date</label>
                <input
                    type="date"
                    id="assistance_date"
                    wire:model.defer="assistance_date"
                    class="w-full input text-sm"
                    required
                >
                <div class="text-xs text-gray-500 mt-1">
                    Only today or past dates are allowed.
                </div>
                @error('assistance_date') 
                    <span class="text-red-600 text-xs">{{ $message }}</span> 
                @enderror
            </div>

        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('aics.list') }}" class="px-5 py-1 bg-gray-500 text-white text-sm font-semibold rounded">Back</a>
            <button type="submit" class="px-4 py-1 bg-blue-600 text-sm font-semibold text-white rounded">Submit</button>
        </div>
    </form>

    <style>
        .input {
            display: block;
            width: 100%;
            padding: .5rem;
            border: 1px solid #d1d5db;
            border-radius: .375rem;
            background: white;
            color: #111827;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('assistance_date');
            const today = new Date();

            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const maxDate = `${yyyy}-${mm}-${dd}`;

            // Set max attribute to today
            dateInput.setAttribute('max', maxDate);

            // Prevent typing future date manually
            dateInput.addEventListener('input', function() {
                if (this.value > maxDate) {
                    this.value = maxDate;
                }
            });
        });
    </script>
</div>

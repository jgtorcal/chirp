<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Factura;

class FacturaPolicy
{
    public function update(User $user, Factura $factura)
    {
        // Cualquier usuario autenticado puede actualizar facturas
        return $user->id !== null;
    }

    public function delete(User $user, Factura $factura)
    {
        // Cualquier usuario autenticado puede eliminar facturas
        return $user->id !== null;
    }
}

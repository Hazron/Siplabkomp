<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class AuthorizationTest extends DuskTestCase
{
    /**
     * Test admin access restrictions
     */
    public function testAdminAccessRestrictions()
    {
        $this->browse(function (Browser $browser) {
            $admin = User::factory()->create(['usertype' => 'admin']);
            $browser->loginAs($admin)
                ->visit('/dashboardadmin')
                ->assertPathIsNot('/dashboardadmin')
                ->assertSee('Unauthorized');
        });
    }

    /**
     * Test mahasiswa access restrictions
     */
    public function testMahasiswaAccessRestrictions()
    {
        $this->browse(function (Browser $browser) {
            $mahasiswa = User::factory()->create(['usertype' => 'mahasiswa']);
            $browser->loginAs($mahasiswa)
                ->visit('/dashboarduser')
                ->assertPathIsNot('/dashboarduser')
                ->assertSee('Unauthorized');
        });
    }

    /**
     * Test superadmin access restrictions
     */
    public function testSuperadminAccess()
    {
        $this->browse(function (Browser $browser) {
            $superadmin = User::factory()->create(['usertype' => 'superadmin']);
            $browser->loginAs($superadmin)
                ->visit('/dashboardsuper')
                ->assertPathIs('/dashboardsuper');
        });
    }
}

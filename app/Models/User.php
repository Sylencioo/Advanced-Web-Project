namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public const ROLES = [
        'admin' => 'Admin Executive',
        'leader' => 'Project Leader',
        'staff' => 'iRMC Staff',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isLeader()
    {
        return $this->role === 'leader';
    }

    public function isStaff()
    {
        return $this->role === 'staff';
    }

    public function ledGrants()
    {
        return $this->hasMany(Grant::class, 'leader_id');
    }

    public function memberGrants()
    {
        return $this->belongsToMany(Grant::class, 'grant_user', 'user_id', 'grant_id');
    }
}
<?php
namespace App\Models\Appoint;
use CodeIgniter\Model;

class Appointment_model extends Model
{
    protected $table      = 'tbl_app_appointment';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'prospect_id', 'client_name', 'client_email', 'client_phone',
        'appointment_date', 'appointment_time', 'service_type', 'appointment_type',
        'consultation_type', 'office_location', 'contact_method',
        'inside_canada', 'existing_client', 'immigration_status',
        'notes', 'status', 'assigned_to', 'reminder_sent', 'insert_on', 'update_on'
    ];

    public function isSlotTaken($date, $time, int $excludeId = 0)
    {
        $builder = $this->where('appointment_date', $date)
                        ->where('appointment_time', $time)
                        ->where('status !=', 3);
        if ($excludeId > 0) {
            $builder->where('id !=', $excludeId);
        }
        return $builder->countAllResults() > 0;
    }

    public function isMemberSlotTaken($date, $time, $member, $excludeId = null)
    {
        $builder = $this->where('appointment_date', $date)
                        ->where('appointment_time', $time)
                        ->where('assigned_to', $member)
                        ->where('status !=', 3);
        if ($excludeId) {
            $builder->where('id !=', (int)$excludeId);
        }
        return $builder->countAllResults() > 0;
    }

    public function getpost()
    {
        return $this->orderBy('id', 'desc')->findAll();
    }

    // Returns appointments for a specific date, optionally filtered by assigned team member.
    public function getByDate($date, $assignedTo = null)
    {
        $builder = $this->where('appointment_date', $date)
                        ->orderBy('appointment_time', 'asc');

        if (!empty($assignedTo)) {
            $builder->where('assigned_to', $assignedTo);
        }

        return $builder->findAll();
    }

    // Returns appointments after a specific date, optionally filtered by assigned team member.
    public function getAfter($date, $assignedTo = null)
    {
        $builder = $this->where('appointment_date >', $date)
                        ->orderBy('appointment_date', 'asc')
                        ->orderBy('appointment_time', 'asc');

        if (!empty($assignedTo)) {
            $builder->where('assigned_to', $assignedTo);
        }

        return $builder->findAll();
    }

    public function getDueForReminder(): array
    {
        $db     = \Config\Database::connect();
        $tz     = new \DateTimeZone('America/Vancouver');
        $now    = (new \DateTime('now', $tz))->format('Y-m-d H:i:s');
        $in5hrs = (new \DateTime('+5 hours', $tz))->format('Y-m-d H:i:s');
        return $db->query(
            "SELECT * FROM tbl_app_appointment WHERE status = 1 AND reminder_sent = 0
             AND CONCAT(appointment_date, ' ', appointment_time) >= ?
             AND CONCAT(appointment_date, ' ', appointment_time) <= ?",
            [$now, $in5hrs]
        )->getResultArray();
    }

    public function getByDateRange($from, $to, $member = '', $service = '')
    {
        $builder = $this->where('appointment_date >=', $from)
                        ->where('appointment_date <=', $to)
                        ->where('status !=', 3)
                        ->orderBy('appointment_time', 'asc');

        if (!empty($member))  $builder->like('assigned_to', $member);
        if (!empty($service)) $builder->like('service_type', $service);

        return $builder->findAll();
    }
}

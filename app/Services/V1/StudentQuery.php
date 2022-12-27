<?php
namespace App\Services\V1;

use Illuminate\Http\Request;

class StudentQuery {
    protected $safeParms = [
        'name' => ['eq'],
        'email' => ['eq']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];

    protected $columnMap = [
        'email' => 'email'
    ];
    public function transform(Request $request) {
        $eloQuery = [];

        foreach($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if(!isset($query)) {
                continue;
            }

        $column = $this->columnMap[$parm] ?? $parm;
        foreach($operators as $operator) {
            if(isset($query[$operator])) {
                $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
        }
        
    }   
    return $eloQuery;
        }
        
}

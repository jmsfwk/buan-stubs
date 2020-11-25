<?php

namespace Buan;

/**
 * This class provides a means to encapsulate an SQL query within an object.
 */
class ModelCriteria
{
    /* Operators — These constants represent the operators in an equation. */
    public const EQUALS = 1;
    public const NOT_EQUALS = 2;
    public const GREATER_THAN = 4;
    public const GREATER_THAN_OR_EQUAL = 8;
    public const LESS_THAN = 16;
    public const LESS_THAN_OR_EQUAL = 32;
    public const LIKE = 64;
    public const NOT_LIKE = 128;
    public const IS_NULL = 256;
    public const IS_NOT_NULL = 512;
    public const FIND_IN_SET = 1024;
    public const IN = 2048;
    public const NOT_IN = 4096;
    public const BETWEEN = 8192;

    /** Logic strings */
    public const LOGIC_OR = 'OR';
    public const LOGIC_AND = 'AND';

    /** Others */
    public const WHERE = 'WHERE';
    public const HAVING = 'HAVING';

    public function __construct()
    {
    }

    /**
     * Clear where clauses. Can be useful after cloning, if you don't want the clone to have the same where clauses.
     * @return void
     */
    public function clearClauses(): void
    {
    }

    /**
     * Generate and return a clause group.
     *
     * @param string $logic Evaluation logic used to join clauses in this new group
     * @param string $type
     * @return ModelCriteria
     */
    public function addGroup(string $logic = ModelCriteria::LOGIC_AND, string $type = ModelCriteria::WHERE): ModelCriteriaGroup
    {
    }

    /**
     * Runs `$this` criteria over the given `Models` and returns a `ModelCollection`
     * containing all that satisfied the criteria.
     *
     * This only works for very simple criteria and clauses in the WHERE group.
     * @param Model|ModelCollection $models Models to which `$this` criteria will be applied
     * @return ModelCollection
     */
    public function applyTo($models): ModelCollection
    {
    }

    /**
     * Returns true if any SELECT fields have been defined.
     * @return bool
     */
    public function hasSelectFields(): bool
    {
    }

    /**
     * Add a field to the SELECT portion of the query
     *
     * If joining multiple tables in this query, then it's a good idea to prefix the field with a table name.
     * You can actual insert a subquery by specifying $field as a `ModelCriteria` object.
     * @param ModelCriteria|string $field Field (eg. "id", "*", "COUNT(*) AS c", etc) or subquery
     * @param string|null $alias Field alias
     * @return void
     */
    public function selectField($field, string $alias = null): void
    {
    }

    /**
     * Add an instance of `AggregateSubquery`
     *
     * @param AggregateSubquery $subQuery
     * @return void
     */
    public function addAggregateSubQuery(AggregateSubquery $subQuery): void
    {
    }


    /**
     * Add a table to the FROM portion of the query.
     * Duplicates will be ignored.
     *
     * @param ModelCriteria|string $table Table name (or subQuery)
     * @param string|null $alias
     * @return void
     */
    public function selectTable($table, string $alias = null): void
    {
    }

    /**
     * Add a clause to the WHERE portion of the query.
     *
     * @param mixed $clause Logic clause (see 'clause constants' above)
     * @param mixed $fieldName Field name
     * @param mixed $fieldValue Field value
     * @param mixed $valueIsReference If true then $fieldValue is assumed to be a column reference rather than a literal value.
     * @return void
     */
    public function addClause($clause, $fieldName, $fieldValue = null, $valueIsReference = false): void
    {
    }

    /**
     * Add a literal clause.
     *
     * Sometimes you need to add clauses that refer to column identifiers, such
     * as `"WHERE table1.id=table2.other_id ..."`.
     * @param string $clause Literal clause
     * @return void
     */
    public function addClauseLiteral(string $clause): void
    {
    }

    /**
     * Add a clause to the HAVING portion of the query.
     *
     * @param $clause Logic clause (see 'clause constants' above)
     * @param $fieldName Field name
     * @param $fieldValue Field value
     * @param bool $valueIsReference If true then $fieldValue is assumed to be a column reference rather than a literal value
     * @return void
     */
    public function addHavingClause($clause, $fieldName, $fieldValue, $valueIsReference = false): void
    {
    }

    /**
     * Sets the limiting clause. Omit both arguments to clear an existing range.
     *
     * @param int|null $start Record at which to start the returned range
     * @param int|null $recordCount Number of records to return
     * @return void
     */
    public function setRange(?int $start = null, ?int $recordCount = null): void
    {
    }

    /**
     * Returns the defined range
     * @return array|null
     */
    public function getRange(): ?array
    {
    }

    /**
     * Adds an ordering clause
     *
     * @param string $fieldName Field name
     * @param string $direction Ordering direction (ASC or DESC)
     * @return void
     */
    public function addOrder(string $fieldName, string $direction = 'ASC'): void
    {
    }

    /**
     * INNER JOIN the specified table using a true inner join, rather than one simulated with a where clause.
     *
     * @param string $table Table name
     * @param string $clause Joining clause (eg. "person.job_id=job.id"
     * @return void
     */
    public function trueInnerJoin(string $table, string $clause, string $alias = null): void
    {
    }

    /**
     * LEFT JOIN the specified table
     *
     * @param string $table Table name
     * @param string $clause Joining clause (eg. "person.job_id=job.id")
     * @param string|null $alias The alias for the joining table.
     * @return void
     */
    public function leftJoin(string $table, string $clause, string $alias = null): void
    {
    }

    /**
     * RIGHT JOIN the specified table
     *
     * @param string $table Table name
     * @param string $clause Joining clause (eg. "person.job_id=job.id")
     * @param string|null $alias The alias for the joining table.
     * @return void
     */
    public function rightJoin(string $table, string $clause, string $alias = null): void
    {
    }

    /**
     * @param ModelCriteria $criteria
     * @param $alias
     * @param $clause
     * @return void
     */
    public function leftJoinSubquery(ModelCriteria $criteria, $alias, $clause): void
    {
    }

    /**
     * @param ModelCriteria $criteria
     * @param $alias
     * @param $clause
     * @return void
     */
    public function rightJoinSubquery(ModelCriteria $criteria, $alias, $clause): void
    {
    }

    /**
     * @param ModelCriteria $criteria
     * @param $alias
     * @param $clause
     * @return void
     */
    public function innerJoinSubquery(ModelCriteria $criteria, $alias, $clause)
    {
    }

    /**
     * Adds necessary elements to join the specified table.
     *
     * `$clause` is a literal string, meaning it will be added to the SQL exactly
     * as provided here.
     * @param string $table Table name
     * @param string $clause Joining clause (will be added to the WHERE portion)
     * @return void
     */
    public function innerJoin(string $table, string $clause): void
    {
    }

    /**
     * Returns a JSON representation of this instance for portability
     * @return string
     */
    public function exportJson(): string
    {
    }

    /**
     * Adds a GROUP BY clause
     *
     * @param string $field Field name (eg. "age" or "table_name.age"
     * @return void
     */
    public function groupBy(string $field): void
    {
    }

    /**
     * Adds an index to the USE INDEX list.
     *
     * Warning: MySQL specific code
     * @param string $index Index name
     * @return void
     */
    public function useIndex(string $index): void
    {
    }

    /**
     * When true, sets caching disabled.
     *
     * Warning: MySQL specific code
     *
     * @param bool $setting
     * @return void
     */
    public function disableCache(bool $setting): void
    {
    }

    /**
     * Removes a GROUP BY clause, or if `$field` is not omitted then all GROUP BY
     * clauses are removed.
     * @param string|null $field Field name (eg. "age" or "table_name.age")
     * @return void
     */
    public function ungroupBy($field = null): void
    {
    }

    public function sqlPrint(): string
    {
    }

    /**
     * Generates and returns an object containing and SQL query and any variable
     * bindings:
     *
     *    [
     *        query: 'actual query',
     *        bindings: [
     *            'param-name': 'param-value',
     *            ...
     *        ],
     *    ]
     * @return \stdClass
     */
    public function sql(): \stdClass
    {
    }

    /**
     * Set INSERT INTO clause, for use before main SELECT.
     *
     * @param string $tableName Name of table to insert into.
     * @param string $columnName Column(s) of table to insert into. If more than one, separate with a comma.
     * @return void
     */
    public function setInsertInto(string $tableName, string $columnName): void
    {
    }

    /**
     * @return void
     */
    public function clearSelectFields(): void
    {
    }
}

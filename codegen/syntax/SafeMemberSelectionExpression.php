<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c657c401a94b21aabb7146c3e518cc1c>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

final class SafeMemberSelectionExpression extends EditableNode {

  private EditableNode $_object;
  private EditableNode $_operator;
  private EditableNode $_name;

  public function __construct(
    EditableNode $object,
    EditableNode $operator,
    EditableNode $name,
  ) {
    parent::__construct('safe_member_selection_expression');
    $this->_object = $object;
    $this->_operator = $operator;
    $this->_name = $name;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $object = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['safe_member_object'],
      $position,
      $source,
    );
    $position += $object->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['safe_member_operator'],
      $position,
      $source,
    );
    $position += $operator->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['safe_member_name'],
      $position,
      $source,
    );
    $position += $name->getWidth();
    return new self($object, $operator, $name);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableNode> {
    return dict[
      'object' => $this->_object,
      'operator' => $this->_operator,
      'name' => $this->_name,
    ];
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    ?Traversable<EditableNode> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $object = $this->_object->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    if (
      $object === $this->_object &&
      $operator === $this->_operator &&
      $name === $this->_name
    ) {
      return $this;
    }
    return new self($object, $operator, $name);
  }

  public function getObjectUNTYPED(): EditableNode {
    return $this->_object;
  }

  public function withObject(EditableNode $value): this {
    if ($value === $this->_object) {
      return $this;
    }
    return new self($value, $this->_operator, $this->_name);
  }

  public function hasObject(): bool {
    return !$this->_object->isMissing();
  }

  /**
   * @returns VariableExpression | FunctionCallExpression |
   * MemberSelectionExpression | SafeMemberSelectionExpression |
   * PrefixUnaryExpression | ScopeResolutionExpression
   */
  public function getObject(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_object);
  }

  public function getOperatorUNTYPED(): EditableNode {
    return $this->_operator;
  }

  public function withOperator(EditableNode $value): this {
    if ($value === $this->_operator) {
      return $this;
    }
    return new self($this->_object, $value, $this->_name);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @returns QuestionMinusGreaterThanToken
   */
  public function getOperator(): QuestionMinusGreaterThanToken {
    return TypeAssert\instance_of(
      QuestionMinusGreaterThanToken::class,
      $this->_operator,
    );
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  public function withName(EditableNode $value): this {
    if ($value === $this->_name) {
      return $this;
    }
    return new self($this->_object, $this->_operator, $value);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns NameToken | XHPClassNameToken | Missing
   */
  public function getName(): ?EditableToken {
    if ($this->_name->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableToken::class, $this->_name);
  }

  /**
   * @returns NameToken | XHPClassNameToken
   */
  public function getNamex(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_name);
  }
}

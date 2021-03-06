<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1b70eec2c30b2e603ff03f8ef3db61ca>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

final class EmbeddedBracedExpression extends EditableNode {

  private EditableNode $_left_brace;
  private EditableNode $_expression;
  private EditableNode $_right_brace;

  public function __construct(
    EditableNode $left_brace,
    EditableNode $expression,
    EditableNode $right_brace,
  ) {
    parent::__construct('embedded_braced_expression');
    $this->_left_brace = $left_brace;
    $this->_expression = $expression;
    $this->_right_brace = $right_brace;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_left_brace'],
      $position,
      $source,
    );
    $position += $left_brace->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_expression'],
      $position,
      $source,
    );
    $position += $expression->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_right_brace'],
      $position,
      $source,
    );
    $position += $right_brace->getWidth();
    return new self($left_brace, $expression, $right_brace);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableNode> {
    return dict[
      'left_brace' => $this->_left_brace,
      'expression' => $this->_expression,
      'right_brace' => $this->_right_brace,
    ];
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    ?Traversable<EditableNode> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $expression === $this->_expression &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new self($left_brace, $expression, $right_brace);
  }

  public function getLeftBraceUNTYPED(): EditableNode {
    return $this->_left_brace;
  }

  public function withLeftBrace(EditableNode $value): this {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new self($value, $this->_expression, $this->_right_brace);
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getLeftBrace(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_left_brace);
  }

  public function getExpressionUNTYPED(): EditableNode {
    return $this->_expression;
  }

  public function withExpression(EditableNode $value): this {
    if ($value === $this->_expression) {
      return $this;
    }
    return new self($this->_left_brace, $value, $this->_right_brace);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getExpression(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_expression);
  }

  public function getRightBraceUNTYPED(): EditableNode {
    return $this->_right_brace;
  }

  public function withRightBrace(EditableNode $value): this {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new self($this->_left_brace, $this->_expression, $value);
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getRightBrace(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_right_brace);
  }
}

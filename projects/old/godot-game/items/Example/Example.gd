extends Control


var file : FileAccess = FileAccess.open("res://items/Example/example.json", FileAccess.READ)
var json_result : Dictionary = JSON.parse_string(file.get_as_text())

@onready var button : OptionButton = $OptionButton
@onready var flex_container : FlexContainer = $FlexContainer

@export var propery_id : int = 1
@export var button_disabled : bool = false
@export var default_value : int = 0

func _ready() -> void:
	init_button()

func init_button() -> void:
	
	var example : Variant = json_result["examples"][propery_id-1]
	var property : String = example["property"]
	var values : Array = example["values"]
	
	for index in values.size():
		var text : String = property+": "+values[index]+";"
		button.add_item(text, index)
	
	button.disabled = button_disabled
	button.selected = default_value
#	button.pressed.connect(button_pressed)
#
#
#func button_pressed() -> void:
#	print("Hello world!")


func _on_option_button_item_selected(index):
	pass # Replace with function body.

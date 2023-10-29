extends Control


var file : FileAccess = FileAccess.open("res://items/Example/example.json", FileAccess.READ)
var text : String = file.get_as_text()
var json_result : Dictionary = JSON.parse_string(text)

@export var example_id : int = 1


func _ready() -> void:
	create_button()
	
	


func create_button() -> void:
	var example : Variant = json_result["examples"][example_id-1]
	var property : String = example["property"]
	var values : Array = example["values"]
	
	var button : OptionButton = OptionButton.new()
	button.text = property
	
	for index in values.size():
		button.add_item(values[index], index)
	
	button.pressed.connect(self._button_pressed)
	add_child(button)


func _button_pressed() -> void:
	print("Hello world!")
